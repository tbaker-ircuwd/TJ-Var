<?php

function query($query){
        try{
                $conn = new PDO("mysql:host=192.168.2.53;dbname=Leap", "phpuser", "d2hhdHNteXBhc3N3b3Jk!");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
                echo "Connection failed: " . $e->getMessage();
        }

        try{
                $stmt = $conn->prepare($query);
                $stmt->execute();
                if(strtoupper(substr($query, 0, 6)) == "SELECT"){
                       $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                       return $result;
                }else if(strtoupper(substr($query, 0, 6)) == "INSERT"){
                        return $conn->lastInsertID();
                }
        }catch(PDOException $e){
                echo "SQL Error: " . $e->getMessage();
        }
}


function getMaterials($warehouse){
        if($warehouse == "warehouse"){
                $query = "SELECT `materials2.0`.materials_name, `materials_skus2`.materials_skus_name FROM `materials2.0` LEFT JOIN `materials_skus2` ON `materials2.0`.materials_id = `materials_skus2`.materials_skus_materials_id";
        }else{
                return;
        }
        return query($query);
}
?>

