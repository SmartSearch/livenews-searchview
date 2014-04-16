<?php
/*
* SMART FP7 - Search engine for MultimediA enviRonment generated contenT
* Webpage: http://smartfp7.eu
*
* This Source Code Form is subject to the terms of the Mozilla Public
* License, v. 2.0. If a copy of the MPL was not distributed with this
* file, You can obtain one at http://mozilla.org/MPL/2.0/.
*
* The Original Code is Copyright (c) 2012-2014 PRISA Digital
* All Rights Reserved
*/
namespace prisadigital\Entity;

use DateTime;

class Latest {
    
 /**
  *
  * @var string
  */
  protected $id;

  /**
   *
   * @var DateTime
   */
  protected $startTime;
  
  /**
   *
   * @var string
   */
  protected $activity;
  
  /**
   *
   * @var string
   */
  protected $locationId;
  
  /**
   *
   * @var string
   */
  protected $locationName;
  
  /**
   *
   * @var string
   */
  protected $locationAddress;
  
  /**
   *
   * @var array
   */
  protected $observations;
  /*
    array (size=1)
      'topTweets' => 
        array (size=1)
          0 => 
            array (size=23)
              ...
   * */

  /**
   *
   * @var array
   */
  protected $latestObservations;
  
  /**
   *
   * @var string
   */
  protected $media;
  
  /**
   *
   * @var float
   */
  protected $lat;
  
  /**
   *
   * @var float
   */
  protected $lon;
  
  /**
   *
   * @var int
   */
  protected $rank;
  
  /**
   *
   * @var float
   */
  protected $score;
  
  /**
   *
   * @var string
   */
  protected $description;
  
  /**
   *
   * @var string
   */
  protected $URI;
  
  /**
   *
   * @var string
   */
  protected $title;

  /**
   *
   * @var string
   */
  protected $geohash;

  /**
   *
   * @var int
   */
  protected $lorder;
  
  /**
   *
   * @var array
   */
  protected $triggers;
  
  /**
   *
   */
  function __construct($id, DateTime $startTime, $activity, $locationId, $locationName, $locationAddress, $observations, $latestObservations, $media, $lat, $lon, $rank, $score, $description, $URI, $title, $geohash, $lorder, $triggers) {
      $this->id = $id;
      $this->startTime = $startTime;
      $this->activity = $activity;
      $this->locationId = $locationId;
      $this->locationName = $locationName;
      $this->locationAddress = $locationAddress;
      $this->observations = $observations;
      $this->latestObservations = $latestObservations;
      $this->media = $media;
      $this->lat = $lat;
      $this->lon = $lon;
      $this->rank = $rank;
      $this->score = $score;
      $this->description = $description;
      $this->URI = $URI;
      $this->title = $title;
      $this->geohash = $geohash;
      $this->lorder = $lorder;
      $this->triggers = $triggers;
  }
  
  /**
   *
   */
  public function getId() {
      return $this->id;
  }

  /**
   *
   */
  public function getStartTime() {
      return $this->startTime;
  }

  /**
   *
   */
  public function getActivity() {
      return $this->activity;
  }

  /**
   *
   */
  public function getLocationId() {
      return $this->locationId;
  }

  /**
   *
   */
  public function getLocationName() {
      return $this->locationName;
  }

  /**
   *
   */
  public function getLocationAddress() {
      return $this->locationAddress;
  }

  /**
   *
   */
  public function getObservations() {
      return $this->observations;
  }

  /**
   *
   */
  public function getLatestObservations() {
      return $this->latestObservations;
  }

  /**
   *
   */
  public function getMedia() {
      return $this->media;
  }

  /**
   *
   */
  public function getLat() {
      return $this->lat;
  }

  /**
   *
   */
  public function getLon() {
      return $this->lon;
  }

  /**
   *
   */
  public function getRank() {
      return $this->rank;
  }

  /**
   *
   */
  public function getScore() {
      return $this->score;
  }

  /**
   *
   */
  public function getDescription() {
      return $this->description;
  }

  /**
   *
   */
  public function getURI() {
      return $this->URI;
  }

  /**
   *
   */
  public function getTitle() {
      return $this->title;
  }

  /**
   *
   */
  public function getGeohash() {
      return $this->geohash;
  }

  /**
   *
   */
  public function getLorder() {
      return $this->lorder;
  }

  /**
   *
   */
  public function getTriggers() {
      return $this->triggers;
  }

  /**
   *
   */
  public function setId($id) {
      $this->id = $id;
  }

  /**
   *
   */
  public function setStartTime(DateTime $startTime) {
      $this->startTime = $startTime;
  }

  /**
   *
   */
  public function setActivity($activity) {
      $this->activity = $activity;
  }

  /**
   *
   */
  public function setLocationId($locationId) {
      $this->locationId = $locationId;
  }

  /**
   *
   */
  public function setLocationName($locationName) {
      $this->locationName = $locationName;
  }

  /**
   *
   */
  public function setLocationAddress($locationAddress) {
      $this->locationAddress = $locationAddress;
  }

  /**
   *
   */
  public function setObservations($observations) {
      $this->observations = $observations;
  }

  /**
   *
   */
  public function setLatestObservations($latestObservations) {
      $this->latestObservations = $latestObservations;
  }

  /**
   *
   */
  public function setMedia($media) {
      $this->media = $media;
  }

  /**
   *
   */
  public function setLat($lat) {
      $this->lat = $lat;
  }

  /**
   *
   */
  public function setLon($lon) {
      $this->lon = $lon;
  }

  /**
   *
   */
  public function setRank($rank) {
      $this->rank = $rank;
  }

  /**
   *
   */
  public function setScore($score) {
      $this->score = $score;
  }

  /**
   *
   */
  public function setDescription($description) {
      $this->description = $description;
  }

  /**
   *
   */
  public function setURI($URI) {
      $this->URI = $URI;
  }

  /**
   *
   */
  public function setTitle($title) {
      $this->title = $title;
  }

  /**
   *
   */
  public function setGeohash($geohash) {
      $this->geohash = $geohash;
  }

  /**
   *
   */
  public function setLorder($lorder) {
      $this->lorder = $lorder;
  }

  /**
   *
   */
  public function setTriggers($triggers) {
      $this->triggers = $triggers;
  }
  
  /**
   *
   */
  public function getFirstTrigger() {
      if (isset($this->triggers[0])) {
          return $this->triggers[0];
      }
      return '';
  }

  /**
   *
   */
  public function getTuitDescription(){
      if (isset($this->observations['topTweets'][0]['text']) ) {
          return $this->observations['topTweets'][0]['text'];
      }
      return '';
  }
    
  /**
   * 
   * @return float
   */
  public function getCrowdDensityObservation() {
      if (isset($this->observations['crowd_density'])) {
          return $this->observations['crowd_density'];
      }
      return null;
  }
  
  /**
   * 
   * @return float
   */
  public function getMusicScoreObservation() {
      if (isset($this->observations['music_score'])) {
          return $this->observations['music_score'];
      }
      return null;
  }
  
  /**
   * 
   * @return float
   */
  public function getTrafficScoreObservation() {
      if (isset($this->observations['traffic_score'])) {
          return $this->observations['traffic_score'];
      }
      return null;
  }  
  
  /**
   *
   */
  public function getTotalCheck() {
      $lastObservation = $this->getLatestObservations();
      if (isset($lastObservation['totalCheckIns'])){
          return $lastObservation['totalCheckIns'];
      }
      return null;
  }
}
