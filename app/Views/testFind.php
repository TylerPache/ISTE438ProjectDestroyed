<?php
if(isset($title)){
echo "<title>".$title."</title>";
}
else{
    echo "<title>Data not working</title>";
}

if(isset($info)){
print_r($info);

}