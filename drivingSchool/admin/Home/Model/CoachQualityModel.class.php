<?php
/*
 * @author:hechengwei
 * @date  :2016-4-13
 * @tablename:带教教练资质表
 * */
namespace Home\Model;
use Think\Model;
class CoachQualityModel extends Model {
    /**
     * 查询全部数据
     */
    public function getValue($where,$order,$limit)
    {
        return $this->select();
    }
    /**
     * 删除数据
	 */
    public function delValue($where)
    {
        return $this->where("quality_id = '$id'")->delete();
    }
}
?>