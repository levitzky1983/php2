<?
class M_Good extends Model {
    public function getData() {
        $id = $_GET['id'];
        $sql = "SELECT good.id as id, good.title as title, good.price as price, good.article as article, good.img as img, cat.title as category, form.title as form, manuf.title as manufacturer, color.title as color, inf.info as info, mat.title as material FROM goods as good ";
        $sql .= "LEFT JOIN categories as cat on good.id_category = cat.id LEFT JOIN forms as form on good.id_form=form.id LEFT JOIN manufacturers as manuf on good.id_manufacturer=manuf.id LEFT JOIN colors as color on good.id_color=color.id LEFT JOIN information as inf on good.id_info=inf.id LEFT JOIN materials as mat on good.id_material = mat.id WHERE good.id=:id";
        $result = DB::getRow($sql,[':id'=>$id]);
        return $result;
    }
}