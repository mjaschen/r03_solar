<?php
/**
 * View helper for displaying a gravatar image
 *
 * @link http://en.gravatar.com/site/implement/images/
 *
 * @package R03
 *
 * @author Marcus T. Jaschen <mj@mtb-news.de>
 **/
class R03_View_Helper_Gravatar extends Solar_View_Helper
{
    /**
     * default configuration
     *
     * @config string href The base URL of Gravatar web service
     *
     * @config string default The default icon which is shown if
     *   no gravatar is found for the given email address
     *
     * @config string size The size of the Gravatar image, '1' ... '512'
     *
     * @config string rating The allowed rating of the returned image.
     *   An user can choose a rating for his Gravatar images.
     *
     * @var array
     **/
    protected $_R03_View_Helper_Gravatar = array(
        'href'    => "http://www.gravatar.com/avatar/",
        'default' => 'mm',
        'size'    => '80',
        'rating'  => 'x'
    );

    /**
     * returns an <img /> tag for a gravatar image
     *
     * Options:
     *
     * - 'default' - choose a different default image
     * - 'size' - choose a different image size (1..512)
     * - 'rating' - choose a different rating for the image
     *
     * @param string $email the email address for which the gravatar should be loaded
     *
     * @param array $options
     *
     * @return string
     *
     * @author Marcus T. Jaschen <mj@mtb-news.de>
     **/
    public function gravatar($email, $options = array())
    {
        $hash = md5(strtolower(trim($email)));

        $default = $this->_config['default'];
        $size    = $this->_config['size'];
        $rating  = $this->_config['rating'];

        // check options argument

        if (! empty($options['default'])) {
            $default = $options['default'];
        }

        if (! empty($options['size'])) {
            $size = $options['size'];
        }

        if (! empty($options['rating'])) {
            $rating = $options['rating'];
        }

        // validate options

        if ((int) $size < 1 || (int) $size > 512) {
            $size = $this->_config['size'];
        }

        if (! in_array($rating, array('g', 'pg', 'r', 'x'))) {
            $rating = $this->_config['rating'];
        }

        if (! in_array($default, array('404', 'mm', 'identicon', 'monsterid', 'wavatar'))) {
            $default = $this->_config['default'];
        }

        // build img tag

        $url = "{$this->_config['href']}{$hash}?d={$default}&s={$size}&r={$rating}";

        return $this->_view->image($url, array(
            'width'  => $size,
            'height' => $size,
            'alt'    => 'avatar'
        ));
    }
}