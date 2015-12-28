<?php
namespace Home\Common;

/* 
*封装JSON 和 XML的信息传输
*show()综合入口：
*@param integar $code 状态码
*@param string $message 提示信息
*@param array() $data 需要传输的信息
*@param string $method 选用的数据方式
*/
class Response{
    const XML = 'xml';
    public static function show($code,$message,$data,$method=XML){
    	if(!is_numeric($code)){
    		return '';
    	}

    	$result=array(
            'code' => $code,
            'message' => $message,
            'data' => $data,
            'method' => $method,
    	);

    	if($method=='xml'){
    		return self::xmlEncode($code,$message,$data);
    		exit;
    	}elseif ($method=='json') {
    		return self::json($code,$message,$data);
    	}elseif ($method=='test') {
    		return var_dump($result);
    	}
    }

    /*
    *@json方式传输数据
    *@param integar $code 状态码 
    *@param string $message 提示信息
    *@param array() $data 需要传输的信息
    */
    private function json($code,$message,$data){
    	if(!is_numeric($code)){
    		return '';
    	}

    	// $result=array(
    		//'code' => $code,
    		//'message' => $message,
    		//'data' => $data,
     //    );

        return json_encode($data);
    }

    /*@xml方式传输数据
    *@param integar $code 状态码 
    *@param string $message 提示信息
    *@param array() $data 需要传输的信息
    */  
    private function xmlEncode($code,$message,$data){
        if(!is_numeric($code)){
            return '';
        }

        $result = array(
            //'code' => $code,
            //'message' => $message,
            'data' => $data,
        );

        header('Content-type:text/xml');
        $xml="<?xml version = '1.0' encoding= 'utf-8'?>";
        $xml.="<root>\n";
        $xml.=self::xmlToEncode($data);    //将$data数据写成XML格式
        $xml.="</root>\n";

        return $xml;
    }

    private function xmlToEncode($data){
        $xml = " ";
        foreach ($data as $key => $value) {
            $attr="";
            if(is_numeric($key)){
                $attr="id='{$key}'";
                $key="item";
            }
            $xml.="<{$key} {$attr}>\n";
            $xml.=is_array($value)?self::xmlToEncode($value):$value;
            $xml.="\n";
            $xml.="</{$key}>\n";
        }
        return $xml;
    }
    
}


?>