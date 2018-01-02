<?php
        ini_set('display_errors', 1);
        include_once("../admin/dbfunc.php");
        $db = new EventFunctions;
        $colors = array(0 => "#7291CC",1 => "#E47B92",2 => "#808D8E",3 => "#F79F79",4 => "#A0CA92", 5 => "#BDA0CB"  );
        $m = (integer) date('n');
        $start = date("U",strtotime($_GET['start']));
        $end = date("U",strtotime($_GET['end']));
        $events = $db->getEventsInterval($start,$end);
        $out = array();
        foreach ($events as $event) {
        $out[] = array(
            'id' => $event["event_id"],
            'title' => $event["name"],
            'start' => date("c",$event["start_datetime"]),
            'end' => date("c",$event["end_datetime"]),
            'color' => $colors[$event['color']] 
        );
    }
    echo json_encode($out);
    exit;
    ?>