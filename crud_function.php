<?php
//define bucket file
define(bucketFile, 'gs://example-khang-bucket-1/project.csv');
function readData() {
    if (($handle = fopen(bucketFile, "r")) !== FALSE) {
        fgetcsv($handle, 1000, ",");
            while (($data = fgetcsv($handle, 9999, ",")) !== FALSE) {
                {
                    echo "<tr>",
                    "<th scope='row'>",
                    "<form action='/' method='POST'>"
                    , "<button type='submit' value='" . $data[0] . "' name='deleteProject' class='btn btn-danger btn-block'>Delete</button>"
                    , "</form>"
                    , "<form onsubmit=\"updateForm(event, ".$data[0].")\">"
                    , "<button type='submit' value='" . $data[0] . "' name='viewOne' onClick='Window.href='#formtitle'' class='btn btn-primary btn-block'>Update</button>"
                    , "</form>"
                    , "</th>";
                    foreach ($data as $field) {
                        echo "<td class ='text-justify'>" . $field . "</td>";
                    }
                    echo "</tr>";
                }
            }
            fclose($handle);
        }
    }

function createData() {
     $handle = file_get_contents(bucketFile);
        $newid=0;
        if (empty($handle)) {
            $id = 1;
        } else {
            $rows = str_getcsv($handle, "\n");
            $id = ((int)str_getcsv(end($rows), ",")[0]);
            $newid = $id+ 1;
        }
        $str = sprintf('%d,"%s","%s","%s","%s","%s","%s","%s"' . "\n", $newid,$_POST['form1'], $_POST['form2'], $_POST['form3'], $_POST['form4'], $_POST['form5'], $_POST['form6'], $_POST['form7']);
        $handle.=$str;
        $file = fopen(bucketFile, 'w');
        fwrite($file, $handle);
        fclose($file);
}

function deleteData(){
    $id= $_POST['deleteProject'];
    $dataArray = file(bucketFile, FILE_IGNORE_NEW_LINES);
    $row=0;
    foreach($dataArray as $key=>$project) {
        $projectObject = explode(",", $project);
        if ($projectObject[0] == $id) {
            if (count($projectObject)<24){
                unset($dataArray[$key+1]);
            }
            unset($dataArray[$key]);
            $csvFileBody = implode("\n", $dataArray);
            $csvFileBody .="\n";
            $csvFile = fopen(bucketFile, "w");
            fwrite($csvFile , $csvFileBody);
            fclose($csvFile );
            break;
        }
        $row++;
        }
}

function editData()
{
    $id = $_POST['editProject'];
    $replaceString = sprintf('%s,"%s","%s","%s","%s","%s","%s","%s"',$_POST['id'], $_POST['form1'], $_POST['form2'], $_POST['form3'], $_POST['form4'], $_POST['form5'], $_POST['form6'], $_POST['form7']);

        $arrayObjects=file(bucketFile, FILE_IGNORE_NEW_LINES);
        foreach($arrayObjects as $key=>$project) {
            $projectObject = explode(",", $project);
            if ($projectObject[0] == $id) {


                $arrayObjects[$key] = $replaceString;

                $csvFileBody = implode("\n", $arrayObjects);

                $csvFile = fopen(bucketFile, "w");
                fwrite($csvFile , $csvFileBody);
                fclose($csvFile );
            }
        }
    }




            
?>