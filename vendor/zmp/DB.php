<?php
/** * Created by PhpStorm.
 * User: PolinaKolzunova
 * Date: 06.02.2020
 * Time: 16:02
 */

namespace zmp;

use \App;

/**
 * Singleton класс для обращения к БД
 * позволяет выполнять простые и подготовленные запросы
 */
class DB
{
    /**
     * @var object
     */
    protected static $_connection;

    /**
     * @var object
     */
    public $mysqli;

    /**
     * @throws \Exception
     */
    private function __construct()
    {
        $this->mysqli = new \Mysqli(
            App::$config['db']['host'],
            App::$config['db']['username'],
            App::$config['db']['password'],
            App::$config['db']['dbname']
        );

        if ($this->mysqli->connect_error) {
            throw new \Exception("Connection Error " . $this->mysqli->connect_errno . "<br>" . $this->mysqli->connect_error);
        }
    }

    public function __destroy()
    {
        $this->mysqli->close();
    }

    /**
     * @return DB|object
     */
    public static function getConnection()
    {
        if (null === self::$_connection) {
            self::$_connection = new self();
        }
        return self::$_connection;
    }

    /**
     * @param $sql
     * @param bool $get_insert_id
     * @return bool|mixed|\mysqli_result
     */
    private function simpleQuery($sql, $get_insert_id = false)
    {
        if ( !($result = $this->mysqli->query($sql))) {
            return false;
        }
        if ($get_insert_id) {
            return $this->mysqli->insert_id;
        }
        return $result;
    }

    /**
     * @param $sql
     * @param $params
     * @param bool|false $get_insert_id
     * @return bool|int|\mysqli_result
     */
    private function prepareQuery($sql, $params, $get_insert_id = false)
    {
        $stmt = $this->mysqli->stmt_init();

        if (
            (($stmt->prepare($sql)) === false) ||
            (call_user_func_array([$stmt, 'bind_param'], self::refValues($params)) === false) ||
            ($stmt->execute() === false) ||
            ($result = $stmt->get_result()) === false && ($result = $stmt->insert_id) === false
        ) {
            return false;
        }

        if ($get_insert_id) {
            if (($result = $stmt->insert_id) === false) {
                return false;
            }
        }
        $stmt->close();

        if (isset($result)) {
            return $result;
        }
        return true;
    }

    /**
     * @param $sql
     * @param array|null $params
     * @param bool|false $get_insert_id
     * @return bool|int|mixed|\mysqli_result
     * @throws \Exception
     */
    public function query($sql, array $params = null, $get_insert_id = false)
    {
        if ($params !== null) {
            $params = $this->addTypesToParams($params);
            $result = $this->prepareQuery($sql, $params, $get_insert_id);
        } else {
            $result = $this->simpleQuery($sql, $get_insert_id);
        }

        if (is_object($result)) {
            if ($result->num_rows == 1) {
                $fields = $result->fetch_assoc();
            } else {
                $i = 0;
                while ($str = $result->fetch_assoc()) {
                    $fields[$i] = $str;
                    $i++;
                }
            }
        } else {
            $fields = $result;
        }

        return $fields;
    }

    /**
     * @param $params
     * @throws \Exception
     * @return array
     */
    private function addTypesToParams(array $params)
    {
        $type_param = '';
        foreach ($params as $key => $param) {
            switch (gettype($param)) {
                case 'boolean' :
                    $type_param .= 'i';
                    break;
                case 'integer' :
                    $type_param .= 'i';
                    break;
                case 'double' :
                    $type_param .= 'd';
                    break;
                case 'string' :
                    $type_param .= 's';
                    break;
                default:
                    throw new \Exception('Error data type');
            }
        }
        array_unshift($params, $type_param);
        return $params;

    }

    /**
     * @param $arr
     * @return array
     */
    private static function refValues(array $arr)
    {
        $refs = [];
        foreach ($arr as $key => $value)
            $refs[$key] = &$arr[$key];
        return $refs;
    }

}