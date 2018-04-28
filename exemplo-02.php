<?php

$filename = "logo.png";

$base64 = base64_encode(file_get_contents($filename));

$fileinfo = new finfo(FILEINFO_MIME_TYPE);

$mimetype = $fileinfo->file($filename);

//echo("data:image/png;base64,".$base64);
echo("data:".$mimetype.";base64,".$base64);//assim fica dinamico
/*a partir daqui ja são aventuras minhas*/
$imagem = "data:$mimetype;base64,$base64";//passo este valor para simplificar o codigo

echo"<a href='$imagem'> Link Para Imagem</a>";//para poder ter que apenas meter a variavel aqui.

echo "<img src='$imagem'>";//e aqui

/*

<?php

$file = fopen("log.txt","a+");//w+ zera o ficheiro e escreve

fwrite($file, date("Y-m-d H:i:s") . "\r\n");

fclose($file);

echo "Arquivo criado com sucesso";
?>

*/

$espaco = fopen("base64.txt","w+");//AQUI É PARA CRIAR O FICHEIRO QUE USEI PARA VER O SEU "PESO"

fwrite($espaco, $imagem);
fclose($espaco);
echo "Arquivo criado";

/*

<?php

$images = scandir("images");

$data = array();

foreach($images as $img){
    if(!in_array($img, array(".",".."))){
        $filename = "images" . DIRECTORY_SEPARATOR . $img;

        $info = pathinfo($filename);

        $info["size"] = filesize($filename);
        $info["modified"] = date("d/m/Y H:i:s", filemtime($filename));
        $info["url"] = "http://localhost/DIR/".str_replace("\\","/",$filename);//str_replace serve para caso esteja a usar windows ele altera as barras que ficam invertidas se ja tiver bom não faz nada.

        array_push($data,$info);
    }
}
echo json_encode($data);

?>

*/

$images = scandir("images");// E AQUI USEI ISTO PARA VER A DIFERENÇA ENTRE A IMAGEM E O FICHEIRO EM TXT

$data = array();

foreach($images as $img){
    if(!in_array($img, array(".",".."))){
        $filename = "images" . DIRECTORY_SEPARATOR . $img;

        $info = pathinfo($filename);

        $info["size"] = filesize($filename);
        $info["modified"] = date("d/m/Y H:i:s", filemtime($filename));
        $info["url"] = "http://localhost/DIR/".str_replace("\\","/",$filename);//str_replace serve para caso esteja a usar windows ele altera as barras que ficam invertidas se ja tiver bom não faz nada.

        array_push($data,$info);
    }
}
echo json_encode($data);

?>