<?php
ob_start();
?>
<?php
require_once 'models/Neighborhood.php';

class NeighborhoodController {
    public function showNeighborhoods(){
        $neigborhood = new Neighborhood();

        $neighs = $neigborhood->getAll();

        return $neighs;
    }
}?>
<?php
ob_end_flush();
?>