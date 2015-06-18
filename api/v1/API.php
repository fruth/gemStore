<?php

class API {

    /**
    * Checks if a user is logged in.
    *
    * @return boolean
    */
    public function getStatus(){
        return true;
    }

    /**
     * @param string $server
     * @url stats/([0-9]+)
     * @url stats
     * @return string
     */
    public function getStats($id = '0') {

      $itemHandler = new ItemHandler();
      $item = $itemHandler->getItems($id);

      return $item;
    }

}

?>
