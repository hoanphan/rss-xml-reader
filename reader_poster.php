<?php
 namespace hoanphan\reader;
/**
 * Created by PhpStorm.
 * User: HOANDHTB
 * Date: 8/10/2016
 * Time: 3:35 PM
 */
class reader_poster
{
    public function  actionData($rss)
    {
        $url=$rss;
        $file=new \XMLReader();
        $file->open($url);
        $arr=array();
        $arr1=array();
        while ($file->read())
        {

            if($file->nodeType==\XMLReader::ELEMENT&&$file->localName=='title')
            {
                $file->read();
                if($file->value!=null) {
                    $arr1[0] = $file->value;
                }

            }
            if($file->nodeType==\XMLReader::ELEMENT&&$file->localName=='description')
            {
                $file->read();
                if($file->value!=null)
                    $arr1[1]=$file->value;
            }
            if($file->nodeType==\XMLReader::ELEMENT&&$file->localName=='link')
            {

                $file->read();
                if($file->value!=null)
                    $arr1[2]=$file->value;
            }
            if($file->nodeType==\XMLReader::ELEMENT&&$file->localName=='image')
            {

                $file->read();
                if($file->value!=null)
                    $arr1[3]=$file->value;
            }
            if(count($arr1)==4)
            {

                array_push($arr,$arr1);

            }
        }
        return $arr;
    }
}