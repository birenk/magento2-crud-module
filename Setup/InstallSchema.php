<?php

namespace Biren\Crudimage\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
		$installer = $setup;
		$installer->startSetup();

		/**
		 * Creating table biren_crudimage
		 */
		$table = $installer->getConnection()->newTable(
			$installer->getTable('biren_crudimage')
		)->addColumn(
			'crudimage_id',
			\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
			null,
			['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
			'Entity Id'
		)->addColumn(
			'title',
			\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
			255,
			['nullable' => true],
			'Title'
		)->addColumn(
			'author',
			\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
			255,
			['nullable' => true,'default' => null],
			'Author'
		)->addColumn(
			'status',
			\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
			1,
			['nullable' => false,'default' => 0],
			'Status'
		)->addColumn(
			'content',
			\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
			'2M',
			['nullable' => true,'default' => null],
			'Content'
		)->addColumn(
			'image',
			\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
			255,
			['nullable' => true,'default' => null],
			'Image'
		)->addColumn(
			'created_at',
			\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
			null,
			['nullable' => false],
			'Created At'
		)->setComment(
            'Biren Crudimage Table'
        );
		$installer->getConnection()->createTable($table);
		$installer->endSetup();
	}
}