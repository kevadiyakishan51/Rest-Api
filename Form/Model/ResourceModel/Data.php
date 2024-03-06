<?php
namespace KK\Form\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
class Data extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('kk_custom_table', 'id');
    }

    /**
     * Get data from custom table
     *
     * @return array
     */
    public function getCustomTableData()
    {
        $connection = $this->getConnection();

        $select = $connection->select()->from(
            $this->getMainTable(),
            ['id', 'name', 'gender', 'email', 'status', 'feedback']
        );

        $result = $connection->fetchAll($select);


        return $result;
    }

    /**
     * Get data from custom table by ID
     *
     * @param int $id
     * @return array
     */
    public function getDataById($id)
    {
        $connection = $this->getConnection();

        $select = $connection->select()->from(
            $this->getMainTable(),
            ['id', 'name', 'gender', 'email', 'status', 'feedback']
        )->where(
            'id = :id'
        );


        $data = $connection->fetchRow($select, ['id' => (int)$id]);

        return $data;
    }


}

