<?php

namespace Goldfinch\Component\Blog\Models\Nest;

use SilverStripe\Assets\Image;
use SilverStripe\Forms\TextField;
use SilverStripe\Control\Director;
use SilverStripe\TagField\TagField;
use SilverStripe\Forms\DatetimeField;
use SilverStripe\Forms\TextareaField;
use Goldfinch\Nest\Models\NestedObject;
use Goldfinch\Component\Blog\Admin\BlogAdmin;
use Goldfinch\Component\Blog\Pages\Nest\Blog;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use Goldfinch\Component\Blog\Models\Nest\BlogCategory;
use Goldfinch\FocusPointExtra\Forms\UploadFieldWithExtra;

class BlogItem extends NestedObject
{
    public static $nest_up = null;
    public static $nest_up_children = [];
    public static $nest_down = Blog::class;
    public static $nest_down_parents = [];

    private static $table_name = 'BlogItem';
    private static $singular_name = 'article';
    private static $plural_name = 'articles';

    private static $db = [
        'Summary' => 'Text',
        'Text' => 'HTMLText',
        'Date' => 'Datetime',
        'Author' => 'Varchar',
    ];

    private static $many_many = [
        'Categories' => BlogCategory::class,
    ];
    private static $many_many_extraFields = [
        'Categories' => [
            'SortOrder' => 'Int',
        ],
    ];

    private static $has_one = [
        'Image' => Image::class,
    ];

    private static $owns = [
        'Image',
        'Categories',
    ];

    private static $summary_fields = [
        'Image.CMSThumbnail' => 'Image',
    ];

    // private static $belongs_to = [];
    // private static $has_many = [];
    // private static $belongs_many_many = [];
    // private static $default_sort = null;
    // private static $indexes = null;
    // private static $casting = [];
    // private static $defaults = [];
    // private static $field_labels = [];
    // private static $searchable_fields = [];

    // private static $cascade_deletes = [];
    // private static $cascade_duplicates = [];

    // * goldfinch/helpers
    private static $field_descriptions = [];
    private static $required_fields = [
        'Title',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName([
            'Categories',
        ]);

        $fields->addFieldsToTab(
            'Root.Main',
            [
                ...UploadFieldWithExtra::create('Image', 'Image', $fields, $this)->getFields(),
                ...[
                    TextField::create('Title', 'Title'),
                    TextareaField::create('Summary', 'Summary'),
                    HTMLEditorField::create('Text', 'Text'),
                    DatetimeField::create('Date', 'Date'),
                    TextField::create('Author', 'Author'),
                    TagField::create('Categories', 'Categories', BlogCategory::get())
                ],
            ]
        );

        return $fields;
    }

    // TODO: check if SortOrder exists
    public function nextItem()
    {
        return BlogItem::get()->filter(['SortOrder:LessThan' => $this->SortOrder])->Sort('SortOrder DESC')->first();
    }

    // TODO: check if SortOrder exists
    public function previousItem()
    {
        return BlogItem::get()->filter(['SortOrder:GreaterThan' => $this->SortOrder])->first();
    }

    public function OtherItems()
    {
        return BlogItem::get()->filter('ID:not', $this->ID)->limit(6);
    }

    public function CMSEditLink()
    {
        $admin = new BlogAdmin;
        return Director::absoluteBaseURL() . '/' . $admin->getCMSEditLinkForManagedDataObject($this);
    }

    // public function validate()
    // {
    //     $result = parent::validate();

    //     // $result->addError('Error message');

    //     return $result;
    // }

    // public function onBeforeWrite()
    // {
    //     // ..

    //     parent::onBeforeWrite();
    // }

    // public function onBeforeDelete()
    // {
    //     // ..

    //     parent::onBeforeDelete();
    // }

    // public function canView($member = null)
    // {
    //     return Permission::check('CMS_ACCESS_Company\Website\MyAdmin', 'any', $member);
    // }

    // public function canEdit($member = null)
    // {
    //     return Permission::check('CMS_ACCESS_Company\Website\MyAdmin', 'any', $member);
    // }

    // public function canDelete($member = null)
    // {
    //     return Permission::check('CMS_ACCESS_Company\Website\MyAdmin', 'any', $member);
    // }

    // public function canCreate($member = null, $context = [])
    // {
    //     return Permission::check('CMS_ACCESS_Company\Website\MyAdmin', 'any', $member);
    // }
}
