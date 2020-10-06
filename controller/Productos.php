<?Php
class Productos extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }
    public function Productos()
    {
        //llamar al metodo de la clase View
        $data['page_id'] = 2;
        $data['tag_page'] = "Productos";
        $data['page_title'] = "Productos en Venta";
        $data['page_name'] = "productos";
        $data['page_content'] = "Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
        Eaque ipsa dolor, temporibus, facilis, eligendi unde asperiores blanditiis error 
        officia praesentium pariatur ratione consectetur veniam. Ipsa laborum officia rem ea quia!";
        //llamar a la vista que queremos ver
        
        $this->views->getViews($this, "productos", $data);
    }

    public function verUsuarioAll(){
        $data = $this->model->getUserAll();
        print_r($data);
   }



}
?>