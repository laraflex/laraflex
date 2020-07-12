<?php
namespace App\ResourceMediators;

use laraflex\Contracts\ResourceMediator;
class StorageMediator extends ResourceMediator{

    protected $image = array('jpg', 'png', 'svg', 'jpeg','tif', 'gif','bmp', 'BMP', 'exif', 'webp');
    protected $doc = array('pdf', 'doc', 'docx', 'xls', 'xslx', 'ppt', 'pptx', 'pps');
    protected $media = array('mp3', 'mp4', 'wav', 'mkv', 'avi', 'divix','mov', 'xvid');
    protected $compacted = array('rar', 'zip', 'tar.zg');

    public function toArray ($data)
    {
        $extensions = array_merge($this->image, $this->doc, $this->media, $this->compacted);

        $var = [
            'file' => $data['filename'],
            'baseName' => $data['basename'],
            'dirName' => $data['dirname'],
            'path' => $data['path'],
            'type' => $data['type'],
            'fileName' => $data['basename'],
            'filePath' => $data['dirname'],
        ];
        if ($data['type'] == 'file' && !empty($data['extension'])){
            $dataExtension = $data['extension'];
            if (in_array($dataExtension, $extensions)) {
                $var['extension'] = $data['extension'];
                $var['size'] = $data['size'];
            }else{
                return NULL;
            }
        }

        return $var;
    }

    public static function create()
    {
        return new StorageMediator();
    }

    public function collection($collection)
    {
            $collectionDir = array();
            $collectionFile = array();
            if (!empty($collection)){
                foreach($collection as $item){
                    if ($item['type'] == 'dir'){
                        $itemTmp = $this->toArray($item);
                        if (!empty($itemTmp)){
                            $collectionDir[] = $itemTmp;
                        }
                    }elseif($item['type'] == 'file'){
                        $itemTmp = $this->toArray($item);
                        if (!empty($itemTmp)){
                            $collectionFile[] = $itemTmp;
                        }
                    }
                }
            }
            $collectionTmp = array_merge($collectionDir, $collectionFile);
            if ($collectionTmp!=NULL){
                return $collectionTmp;
            }else{
                return NULL;
            }
    }
    /**
     * Return Json collection
     */
    public function jsonCollection($collection)
    {
        $collectionTmp = $this->collection($collection);
        if ($collectionTmp != NULL){
            return json_encode($collectionTmp);
        }else{
            return NULL;
        }
    }
    /**
     * Return collection object Json
     */
    public function objectCollection($collection)
    {
        $collectionTmp = $this->jsonCollection($collection);
        return json_decode($collectionTmp);
    }
}



