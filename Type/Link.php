<?php
namespace CCDN\GuiBundle\Type;

/**
 * @category CCDN
 * @package  GuiBundle
 *
 * @author   Reece Fowell <reece@codeconsortium.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  Release: 1.0
 * @link     https://github.com/codeconsortium/CCDNGuiBundle
 */
class Link extends AbstractType implements TypeInterface
{
    protected static $type = 'link';

    /**
     * @var string
     */
    protected $route;

    /**
     * @var string[]
     */
    protected $routeParams = [];

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $label;

    /**
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @param string $route
     * @return static
     */
    public function setRoute($route)
    {
        $this->route = $route;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getRouteParams()
    {
        return $this->routeParams;
    }

    /**
     * @param string[] $routeParams
     * @return static
     */
    public function setRouteParams(array $routeParams = [])
    {
        $this->routeParams = $routeParams;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return static
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return static
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }
}
