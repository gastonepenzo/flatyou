<?php

DEFINE('FILE_URL', 'https://www.istat.it/storage/codici-unita-amministrative/Elenco-comuni-italiani.csv');



function get_istat_data()
{
    $csv_data  = file_get_contents(FILE_URL);
    if($csv_data)
    {
        $data = array();
        $csv_lines = explode(PHP_EOL, $csv_data);
        foreach($csv_lines as $index => $csv_line)
        {
            if($index == 0) continue;
            $csv_fields = explode(';', $csv_line);
            $data[] = array(
                '' => trim($csv_fields[0]),
                '' => trim($csv_fields[0]),
                '' => trim($csv_fields[0]),
                '' => trim($csv_fields[0]),
                '' => trim($csv_fields[0]),
                '' => trim($csv_fields[0]),
                '' => trim($csv_fields[0]),
                '' => trim($csv_fields[0]),
                '' => trim($csv_fields[0]),
                '' => trim($csv_fields[0]),
                '' => trim($csv_fields[0]),
                '' => trim($csv_fields[0]),
                '' => trim($csv_fields[0]),
                '' => trim($csv_fields[0]),
            );
        }
        return $data;
    }
    else
    {
        return array('error'=>'Url errato o non raggiungibile');
    }
}

/*
 * MAIN
 */

$data = get_istat_data();

?>