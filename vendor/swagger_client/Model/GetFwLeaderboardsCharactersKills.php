<?php
/**
 * GetFwLeaderboardsCharactersKills
 *
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * EVE Swagger Interface
 *
 * An OpenAPI for EVE Online
 *
 * OpenAPI spec version: 0.7.2
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\Model;

use \ArrayAccess;
use \Swagger\Client\ObjectSerializer;

/**
 * GetFwLeaderboardsCharactersKills Class Doc Comment
 *
 * @category Class
 * @description Top 100 rankings of pilots by number of kills from yesterday, last week and in total.
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class GetFwLeaderboardsCharactersKills implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'get_fw_leaderboards_characters_kills';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'yesterday' => '\Swagger\Client\Model\GetFwLeaderboardsCharactersYesterday[]',
        'last_week' => '\Swagger\Client\Model\GetFwLeaderboardsCharactersLastWeek[]',
        'active_total' => '\Swagger\Client\Model\GetFwLeaderboardsCharactersActiveTotal[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'yesterday' => null,
        'last_week' => null,
        'active_total' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'yesterday' => 'yesterday',
        'last_week' => 'last_week',
        'active_total' => 'active_total'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'yesterday' => 'setYesterday',
        'last_week' => 'setLastWeek',
        'active_total' => 'setActiveTotal'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'yesterday' => 'getYesterday',
        'last_week' => 'getLastWeek',
        'active_total' => 'getActiveTotal'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['yesterday'] = isset($data['yesterday']) ? $data['yesterday'] : null;
        $this->container['last_week'] = isset($data['last_week']) ? $data['last_week'] : null;
        $this->container['active_total'] = isset($data['active_total']) ? $data['active_total'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['yesterday'] === null) {
            $invalidProperties[] = "'yesterday' can't be null";
        }
        if ($this->container['last_week'] === null) {
            $invalidProperties[] = "'last_week' can't be null";
        }
        if ($this->container['active_total'] === null) {
            $invalidProperties[] = "'active_total' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {

        if ($this->container['yesterday'] === null) {
            return false;
        }
        if ($this->container['last_week'] === null) {
            return false;
        }
        if ($this->container['active_total'] === null) {
            return false;
        }
        return true;
    }


    /**
     * Gets yesterday
     *
     * @return \Swagger\Client\Model\GetFwLeaderboardsCharactersYesterday[]
     */
    public function getYesterday()
    {
        return $this->container['yesterday'];
    }

    /**
     * Sets yesterday
     *
     * @param \Swagger\Client\Model\GetFwLeaderboardsCharactersYesterday[] $yesterday Top 100 ranking of pilots by kills in the past day
     *
     * @return $this
     */
    public function setYesterday($yesterday)
    {
        $this->container['yesterday'] = $yesterday;

        return $this;
    }

    /**
     * Gets last_week
     *
     * @return \Swagger\Client\Model\GetFwLeaderboardsCharactersLastWeek[]
     */
    public function getLastWeek()
    {
        return $this->container['last_week'];
    }

    /**
     * Sets last_week
     *
     * @param \Swagger\Client\Model\GetFwLeaderboardsCharactersLastWeek[] $last_week Top 100 ranking of pilots by kills in the past week
     *
     * @return $this
     */
    public function setLastWeek($last_week)
    {
        $this->container['last_week'] = $last_week;

        return $this;
    }

    /**
     * Gets active_total
     *
     * @return \Swagger\Client\Model\GetFwLeaderboardsCharactersActiveTotal[]
     */
    public function getActiveTotal()
    {
        return $this->container['active_total'];
    }

    /**
     * Sets active_total
     *
     * @param \Swagger\Client\Model\GetFwLeaderboardsCharactersActiveTotal[] $active_total Top 100 ranking of pilots active in faction warfare by total kills. A pilot is considered \"active\" if they have participated in faction warfare in the past 14 days.
     *
     * @return $this
     */
    public function setActiveTotal($active_total)
    {
        $this->container['active_total'] = $active_total;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


