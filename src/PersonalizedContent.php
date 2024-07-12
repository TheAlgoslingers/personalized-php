<?php
namespace thealgoslingers\PersonalizedContent;
/**
 * The PersonalizedContent class provides functionalities for fetching personalized content based on the user's IP address.
 */
class PersonalizedContent {
    private $api_key;

    /**
     * Constructor for the PersonalizedContent class.
     *
     * @param string $api_key The API key used for accessing the IP geolocation service.
     */
    public function __construct($api_key) {
        $this->api_key = $api_key;
    }

    /**
     * Fetches the geographical data for a given IP address.
     *
     * This function makes an API call to retrieve the geographical data associated with the provided IP address.
     *
     * @param string $ip_address The IP address for which the geographical data is to be fetched.
     *
     * @return array An associative array containing the geographical data.
     */
    private function getGeoData($ip_address) {
        $url = "https://api.ip2location.io/?key={$this->api_key}&ip={$ip_address}";
        $response = file_get_contents($url);
        return json_decode($response, true);
    }

    /**
     * Retrieves personalized content based on the user's IP address.
     *
     * This function fetches the geographical data for the provided IP address and uses the country information
     * to determine the appropriate content to return.
     *
     * @param string $ip_address The IP address of the user.
     *
     * @return string The personalized content based on the user's country.
     */
    public function getContent($ip_address) {
     session_start();
     if(isset($_SESSION['_ip_country_name_']) && !empty($_SESSION['_ip_country_name_'])){
      $country = $_SESSION['_ip_country_name_'];
        return $this->fetchContentForCountry($country);
      }
        $geo_data = $this->getGeoData($ip_address);
        $country = $geo_data['country_name'];
        /**
         * We are saving the country in session
         * to save Api queries from same ip on 
         * so many requests
         * In this case, unless the session is
         * unset or destroyed. Even if the 
         * user's ip changes,
         * it will not affect
         * the new request
        **/
       $_SESSION['_ip_country_name_'] = $country;
       
        return $this->fetchContentForCountry($country);
    }

    /**
     * Fetches content based on the country.
     *
     * This function retrieves the content from a database based on the provided country.
     * If the country is not found in the database, a default content is returned.
     *
     * @param string $country The country for which the content is to be fetched.
     *
     * @return string The content associated with the provided country.
     */
    private function fetchContentForCountry($country) {
        // Placeholder for actual content
        //fetching logic based on country
        // This is just an example content
        // Please use your own content source
        $content_database = [
            'United States' => 'Latest news from the USA',
            'India' => 'Trending topics in India',
            'Japan' => 'Technology updates from Japan'
        ];
        /**
         * If there's no content for the country, we return the global countent
         * Please set your global content source
         **/
        return $content_database[$country] ?? 'General global news';
    }
}
