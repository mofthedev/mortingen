<?php

namespace Controllers;

use Controller;
use Bulma;
use HTML;
use BulmaClass;
use View;

class TestView extends Controller
{
    // Bulma components
    private function getComponentList()
    {
        return [
            'Form',
            'Buttons',
            'Content',
            'Image',
            'Icon',
            'Notification',
            'Progress',
            'Table',
            'Tags',
            'Title',
            'Breadcrumb',
            'Card',
            'Message',
            'Modal',
            'Navbar',
            'Panel',
            'Tabs',
            'Pagination',
            'Menu',
            'Hero',
            'Footer',
            'Columns',
            'Box',
            'Radio',
            'Dropdown',
            'Level',
            'File',
            'Media',
            'Tabs',
            'Checkbox',
            'Select'
        ];
    }

    // Render test page
    private function renderTestPage($title, $content)
    {
        Bulma::appendHead(HTML::css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css'));

        $view_content = $content;

        if ($title !== 'Test - Hero')
        {
            $navbarBrand = Bulma::NavbarBrand(
                Bulma::NavbarItem(HTML::h1('Mortingen TestView'), true, '/mortingen/TestView')
            );
            $navbarMenu = Bulma::NavbarMenu(
                Bulma::NavbarItem('Home', true, '/mortingen/TestView'),
                '',
                'mainNavbar'
            );
            $navbar = Bulma::Navbar($navbarBrand, $navbarMenu);

            $body = Bulma::Section(
                Bulma::Container(
                    $content
                )
            );
            $view_content = View::concat($navbar, $body);
        }

        $full_html = Bulma::Html(
            $view_content,
            $title
        );

        $this->response->addContent($full_html);
    }

    public function index()
    {
        $list = '';
        foreach ($this->getComponentList() as $component)
        {
            $list .= '<li><a href="' . \App::getURIRoot() . '/TestView/' . strtolower($component) . '">' . $component . '</a></li>';
        }
        $ul = HTML::ul(new View($list));
        $body = View::concat('Please select a component to test.', $ul);
        $message = Bulma::Message('Bulma Component Test Links', $body, [BulmaClass::IS_INFO]);
        $this->renderTestPage('Bulma Component Tests', $message);
    }

    public function form()
    {
        $field1 = Bulma::Field(View::concat(
            Bulma::Label('Name'),
            Bulma::Control(Bulma::Input(['type' => 'text', 'placeholder' => 'e.g. John Doe']))
        ));
        $field2 = Bulma::Field(View::concat(
            Bulma::Label('Email'),
            Bulma::Control(
                View::concat(
                    Bulma::Input(['type' => 'email', 'placeholder' => 'e.g. mail@example.com', 'class' => BulmaClass::IS_SUCCESS]),
                    Bulma::Icon('fas fa-check', [BulmaClass::IS_LEFT])
                ),
                [BulmaClass::HAS_ICONS_LEFT]
            )
        ));
        $field3 = Bulma::Field(View::concat(
            Bulma::Label('Message'),
            Bulma::Control(Bulma::Textarea('Your message here...'))
        ));
        $buttons = Bulma::Field(Bulma::Control(
            Bulma::Buttons(View::concat(
                Bulma::Button('Submit', [BulmaClass::IS_PRIMARY]),
                Bulma::Button('Cancel', [BulmaClass::IS_LIGHT])
            ))
        ));
        $content = View::concat($field1, $field2, $field3, $buttons);
        $this->renderTestPage('Test - Form', $content);
    }

    // Test buttons
    public function buttons()
    {
        $buttons_normal = Bulma::Buttons(View::concat(
            Bulma::Button('Primary', [BulmaClass::IS_PRIMARY]),
            Bulma::Button('Success', [BulmaClass::IS_SUCCESS]),
            Bulma::Button('Danger', [BulmaClass::IS_DANGER])
        ));
        $buttons_sizes = Bulma::Buttons(View::concat(
            Bulma::ButtonLink('Small', '#', [BulmaClass::IS_SMALL]),
            Bulma::ButtonLink('Medium', '#', [BulmaClass::IS_MEDIUM]),
            Bulma::ButtonLink('Large', '#', [BulmaClass::IS_LARGE])
        ));
        $buttons_outlined = Bulma::Buttons(View::concat(
            Bulma::Button('Outlined', [BulmaClass::IS_PRIMARY, BulmaClass::IS_OUTLINED]),
            Bulma::Button('Outlined', [BulmaClass::IS_INFO, BulmaClass::IS_OUTLINED])
        ));
        $content = View::concat(
            Bulma::Title('Standard Buttons'),
            $buttons_normal,
            Bulma::Title('Button Sizes'),
            $buttons_sizes,
            Bulma::Title('Outlined Buttons'),
            $buttons_outlined
        );
        $this->renderTestPage('Test - Buttons', $content);
    }

    // Test image
    public function image()
    {
        $image128 = Bulma::Image(
            'https://cdn.cosmos.so/01f289d4-a6b1-470f-96c2-b8f5c852f26a?format=jpeg',
            '128x128 image',
            [BulmaClass::IS_128X128]
        );

        $image_square = Bulma::Image(
            'https://cdn.cosmos.so/95766a25-f88a-4f6e-bc00-039f66f5759f.?format=jpeg',
            'Square image',
            [BulmaClass::IS_SQUARE]
        );

        $content = Bulma::Cols(
            View::concat(
                Bulma::Col(
                    View::concat(
                        Bulma::Title('128x128 Image'),
                        $image128
                    )
                ),
                Bulma::Col(
                    View::concat(
                        Bulma::Title('Square Image (Ratio)'),
                        $image_square
                    )
                )
            )
        );

        $this->renderTestPage('Test - Image', $content);
    }

    // Test title
    public function title()
    {
        $content = View::concat(
            Bulma::Title('Title 1', '1'),
            Bulma::Subtitle('Subtitle 2', '2'),
            Bulma::Title('Title 3 (Primary)', '3', [BulmaClass::IS_PRIMARY]),
            Bulma::Subtitle('Subtitle 4 (Info)', '4', [BulmaClass::IS_INFO])
        );
        $this->renderTestPage('Test - Title', $content);
    }

    // Test navbar
    public function navbar()
    {
        $menuId = 'mainNavbar';

        $dropdown_items = View::concat(
            Bulma::NavbarItem('About Us', true, '#'),
            Bulma::NavbarItem('Contact', true, '#'),
            Bulma::NavbarDivider(),
            Bulma::NavbarItem('Report an issue', true, '#')
        );
        $dropdown = Bulma::NavbarDropdown(Bulma::NavbarLink('More'), $dropdown_items);

        $brand_content = Bulma::NavbarItem(
            HTML::img(['src' => 'https://i.pinimg.com/736x/9d/9b/6d/9d9b6de60d1f1b4cd8b76ac16fba09dc.jpg', 'width' => '75', 'height' => '150']),
            true,
            '/'
        );
        $burger = Bulma::NavbarBurger($menuId);
        $brand = Bulma::NavbarBrand(View::concat($brand_content, $burger));

        $menu_start = View::concat(Bulma::NavbarItem('Home', true, '#'), $dropdown);
        $menu_end = Bulma::NavbarItem(Bulma::Buttons(View::concat(
            Bulma::ButtonLink('Sign up', '#', [BulmaClass::IS_PRIMARY]),
            Bulma::ButtonLink('Log in', '#', [BulmaClass::IS_LIGHT])
        )));

        $menu = Bulma::NavbarMenu($menu_start, $menu_end, $menuId);

        $navbar_component = Bulma::Navbar($brand, $menu, [BulmaClass::IS_DARK]);

        $this->renderTestPage('Test - Navbar (JS-Free)', $navbar_component);
    }

    // Test panel
    public function panel()
    {
        $heading = Bulma::PanelHeading('Repositories');

        $search_icon = Bulma::Icon('fas fa-search', [BulmaClass::IS_LEFT]);
        $search_input = Bulma::Input(['type' => 'text', 'placeholder' => 'Search']);
        $search_control = Bulma::Control(View::concat($search_input, $search_icon), [BulmaClass::HAS_ICONS_LEFT]);
        $panel_block1 = Bulma::PanelBlock(Bulma::Field($search_control));

        $panel_tabs = Bulma::PanelTabs(View::concat(
            HTML::a('all', ['class' => BulmaClass::IS_ACTIVE]),
            HTML::a('public')
        ));

        $book_icon = Bulma::PanelIcon('fas fa-book');
        $panel_block2 = Bulma::PanelBlock(View::concat($book_icon, ' bulma'), true, '#', [BulmaClass::IS_ACTIVE]);
        $panel_block3 = Bulma::PanelBlock(View::concat($book_icon, ' mortingen-framework'), true, '#');

        $content = Bulma::Panel(View::concat($heading, $panel_block1, $panel_tabs, $panel_block2, $panel_block3));

        $this->renderTestPage('Test - Panel', $content);
    }

    // Test hero
    public function hero()
    {
        $head_navbar = Bulma::Navbar(
            Bulma::NavbarBrand(
                Bulma::NavbarItem('Mortingen Hero Test'),
                'heroNavbar'
            ),
            Bulma::NavbarMenu(
                Bulma::NavbarItem('Home', true, '#'),
                Bulma::NavbarItem(
                    Bulma::ButtonLink(
                        'Download',
                        '#',
                        [BulmaClass::IS_LIGHT, BulmaClass::IS_OUTLINED]
                    )
                ),
                'heroNavbar'
            ),
            [BulmaClass::IS_TRANSPARENT]
        );

        $hero_head = Bulma::HeroHead($head_navbar);

        $hero_body = Bulma::HeroBody(
            Bulma::Container(
                View::concat(
                    Bulma::Title('Hero Title'),
                    Bulma::Subtitle('This is a fullheight hero subtitle that showcases the capabilities of the hero component.')
                ),
                [BulmaClass::HAS_TEXT_CENTERED]
            )
        );

        // Tabs for hero foot
        $tabs_list = HTML::ul(View::concat(
            HTML::li(HTML::a('Overview'), [BulmaClass::IS_ACTIVE]),
            HTML::li(HTML::a('Modifiers')),
            HTML::li(HTML::a('Grid')),
            HTML::li(HTML::a('Elements'))
        ));
        $tabs = HTML::div($tabs_list, [BulmaClass::TABS, BulmaClass::IS_BOXED, BulmaClass::IS_FULLWIDTH]);

        $hero_foot = Bulma::HeroFoot(
            Bulma::Container($tabs, [BulmaClass::HAS_TEXT_CENTERED])
        );

        $hero_component = Bulma::Hero(
            View::concat($hero_head, $hero_body, $hero_foot),
            [BulmaClass::IS_PRIMARY, BulmaClass::IS_FULLHEIGHT]
        );

        $full_html = Bulma::Html(
            $hero_component,
            'Test - Full Hero Component'
        );

        $this->response->addContent($full_html);
    }

    // Test content
    public function content()
    {
        $html_content = View::concat(
            HTML::h1('Hello World'),
            HTML::p('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla accumsan, metus ultrices eleifend gravi.'),
            HTML::ul(View::concat(
                HTML::li('Unordered list item 1'),
                HTML::li('Unordered list item 2')
            ))
        );
        $content = Bulma::Content($html_content);
        $this->renderTestPage('Test - Content', $content);
    }

    // Test icon
    public function icon()
    {
        $icon1 = Bulma::Icon('fas fa-home');
        $icon2 = Bulma::Icon('fas fa-heart', [BulmaClass::IS_MEDIUM, BulmaClass::HAS_TEXT_DANGER]);
        $icon3 = Bulma::Icon('fab fa-twitter', [BulmaClass::IS_LARGE, BulmaClass::HAS_TEXT_INFO]);

        $content = View::concat($icon1, $icon2, $icon3);
        $this->renderTestPage('Test - Icon', $content);
    }

    // Test notification
    public function notification()
    {
        $content = View::concat(
            Bulma::Notification('This is a primary notification.', false, [BulmaClass::IS_PRIMARY]),
            Bulma::Notification('This is a link notification with a close button.', true, [BulmaClass::IS_LINK]),
            Bulma::Notification('This is an info notification.', false, [BulmaClass::IS_INFO]),
            Bulma::Notification('This is a success notification.', false, [BulmaClass::IS_SUCCESS]),
            Bulma::Notification('This is a warning notification.', false, [BulmaClass::IS_WARNING]),
            Bulma::Notification('This is a danger notification.', false, [BulmaClass::IS_DANGER])
        );
        $this->renderTestPage('Test - Notification', $content);
    }

    // Test progress
    public function progress()
    {
        $content = View::concat(
            Bulma::Progress('15'),
            Bulma::Progress('30', '100', [BulmaClass::IS_PRIMARY]),
            Bulma::Progress('45', '100', [BulmaClass::IS_LINK]),
            Bulma::Progress('60', '100', [BulmaClass::IS_INFO]),
            Bulma::Progress('75', '100', [BulmaClass::IS_SUCCESS]),
            Bulma::Progress('90', '100', [BulmaClass::IS_WARNING, BulmaClass::IS_LARGE])
        );
        $this->renderTestPage('Test - Progress', $content);
    }

    // Test table
    public function table()
    {
        $header = HTML::tr(View::concat(HTML::th('ID'), HTML::th('Name'), HTML::th('Email')));
        $body = View::concat(
            HTML::tr(View::concat(HTML::td('1'), HTML::td('John Doe'), HTML::td('john@example.com'))),
            HTML::tr(View::concat(HTML::td('2'), HTML::td('Jane Smith'), HTML::td('jane@example.com')))
        );
        $content = Bulma::Table($header, $body, [], true, true, false, true, true);
        $this->renderTestPage('Test - Table', $content);
    }

    // Test tags
    public function tags()
    {
        $tags1 = Bulma::Tags(View::concat(
            Bulma::Tag('Technology'),
            Bulma::Tag('Framework'),
            Bulma::Tag('PHP')
        ));

        $tags2 = Bulma::Tags(View::concat(
            Bulma::Tag('Success', [BulmaClass::IS_SUCCESS]),
            Bulma::Tag('Large', [BulmaClass::IS_LARGE]),
            Bulma::Tag(View::concat('Deletable', Bulma::Button('', [BulmaClass::DELETE, BulmaClass::IS_SMALL])), [BulmaClass::IS_DANGER])
        ), [BulmaClass::HAS_ADDONS]);

        $content = View::concat($tags1, $tags2);
        $this->renderTestPage('Test - Tags', $content);
    }

    // Test breadcrumb
    public function breadcrumb()
    {
        $items = [
            ['text' => 'Bulma', 'href' => '#'],
            ['text' => 'Components', 'href' => '#'],
            ['text' => 'Breadcrumb', 'href' => '#', 'active' => true]
        ];
        $content = Bulma::Breadcrumb($items);
        $this->renderTestPage('Test - Breadcrumb', $content);
    }

    // Test card
    public function card()
    {
        $header = Bulma::CardHeader(Bulma::CardHeaderTitle('Card Header'));
        $cardContent = Bulma::CardContent('Card content goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
        $footer = Bulma::CardFooter(View::concat(
            Bulma::CardFooterItem('Save', true, '#'),
            Bulma::CardFooterItem('Edit', true, '#'),
            Bulma::CardFooterItem('Delete', true, '#')
        ));

        $content = Bulma::Card(View::concat($header, $cardContent, $footer));
        $this->renderTestPage('Test - Card', $content);
    }

    // Test message
    public function message()
    {
        $message_body = 'This is the message body. You can add <strong>HTML</strong> elements here.';
        $content = View::concat(
            Bulma::Message('Info Header', $message_body, [BulmaClass::IS_INFO], true),
            Bulma::Message('Success Header', $message_body, [BulmaClass::IS_SUCCESS], true)
        );
        $this->renderTestPage('Test - Message', $content);
    }

    // Test modal
    public function modal()
    {
        $modal1 = Bulma::Modal(
            Bulma::Box(HTML::p('This is a simple modal content area.')),
            [BulmaClass::IS_ACTIVE]
        );

        $modal2 = Bulma::ModalCard(
            'Modal Card Title',
            Bulma::Content('This is the body of the modal card. You can put any content here.'),
            Bulma::Buttons(View::concat(
                Bulma::Button('Save changes', [BulmaClass::IS_SUCCESS]),
                Bulma::Button('Cancel')
            )),
            [BulmaClass::IS_ACTIVE]
        );

        $content = View::concat($modal1, HTML::br(), $modal2);
        $this->renderTestPage('Test - Modal', $content);
    }

    // Test tabs
    public function tabs()
    {
        $list1 = HTML::ul(View::concat(
            HTML::li(HTML::a('Pictures'), [BulmaClass::IS_ACTIVE]),
            HTML::li(HTML::a('Music')),
            HTML::li(HTML::a('Videos')),
            HTML::li(HTML::a('Documents'))
        ));
        $tabs1 = Bulma::Tabs($list1);

        $list2 = HTML::ul(View::concat(
            HTML::li(HTML::a('Pictures'), [BulmaClass::IS_ACTIVE]),
            HTML::li(HTML::a('Music')),
            HTML::li(HTML::a('Videos'))
        ));
        $tabs2 = Bulma::Tabs($list2, [BulmaClass::IS_CENTERED]);

        $list3 = HTML::ul(View::concat(
            HTML::li(HTML::a(View::concat(Bulma::Icon('fas fa-image'), HTML::span('Pictures'))), [BulmaClass::IS_ACTIVE]),
            HTML::li(HTML::a(View::concat(Bulma::Icon('fas fa-music'), HTML::span('Music')))),
            HTML::li(HTML::a(View::concat(Bulma::Icon('fas fa-film'), HTML::span('Videos'))))
        ));
        $tabs3 = Bulma::Tabs($list3, [BulmaClass::IS_BOXED]);

        $list4 = HTML::ul(View::concat(
            HTML::li(HTML::a('Left'), [BulmaClass::IS_ACTIVE]),
            HTML::li(HTML::a('Right'))
        ));
        $tabs4 = Bulma::Tabs($list4, [BulmaClass::IS_TOGGLE, BulmaClass::IS_FULLWIDTH]);

        $content = View::concat(
            Bulma::Title('Standard Tabs'),
            $tabs1,
            Bulma::Title('Centered Tabs'),
            $tabs2,
            Bulma::Title('Boxed Tabs with Icons'),
            $tabs3,
            Bulma::Title('Toggle Tabs'),
            $tabs4
        );

        $this->renderTestPage('Test - Tabs', $content);
    }

    // Test pagination
    public function pagination()
    {
        $prev = HTML::a('Previous', ['class' => BulmaClass::PAGINATION_PREVIOUS]);
        $next = HTML::a('Next page', ['class' => BulmaClass::PAGINATION_NEXT]);
        $list = HTML::ul(View::concat(
            HTML::li(HTML::a('1', ['class' => BulmaClass::PAGINATION_LINK, 'aria-label' => 'Goto page 1'])),
            HTML::li(HTML::span('…', ['class' => BulmaClass::PAGINATION_ELLIPSIS])),
            HTML::li(HTML::a('45', ['class' => BulmaClass::PAGINATION_LINK, 'aria-label' => 'Goto page 45'])),
            HTML::li(HTML::a('46', ['class' => BulmaClass::PAGINATION_LINK . ' ' . BulmaClass::IS_CURRENT, 'aria-label' => 'Page 46', 'aria-current' => 'page'])),
            HTML::li(HTML::a('47', ['class' => BulmaClass::PAGINATION_LINK, 'aria-label' => 'Goto page 47'])),
            HTML::li(HTML::span('…', ['class' => BulmaClass::PAGINATION_ELLIPSIS])),
            HTML::li(HTML::a('86', ['class' => BulmaClass::PAGINATION_LINK, 'aria-label' => 'Goto page 86']))
        ), ['class' => BulmaClass::PAGINATION_LIST]);
        $content = HTML::nav(View::concat($prev, $next, $list), ['class' => BulmaClass::PAGINATION, 'role' => 'navigation', 'aria-label' => 'pagination']);
        $this->renderTestPage('Test - Pagination', $content);
    }

    // Test menu
    public function menu()
    {
        $general_label = HTML::p('General', ['class' => BulmaClass::MENU_LABEL]);
        $general_list = HTML::ul(View::concat(HTML::li(HTML::a('Dashboard')), HTML::li(HTML::a('Customers'))), ['class' => BulmaClass::MENU_LIST]);
        $admin_label = HTML::p('Administration', ['class' => BulmaClass::MENU_LABEL]);
        $sub_list = HTML::ul(View::concat(HTML::li(HTML::a('Members')), HTML::li(HTML::a('Plugins')), HTML::li(HTML::a('Add a member'))));
        $admin_list = HTML::ul(View::concat(
            HTML::li(HTML::a('Team Settings')),
            HTML::li(View::concat(HTML::a('Manage Your Team', ['class' => BulmaClass::IS_ACTIVE]), $sub_list)),
            HTML::li(HTML::a('Invitations'))
        ), ['class' => BulmaClass::MENU_LIST]);
        $content = HTML::aside(View::concat($general_label, $general_list, $admin_label, $admin_list), ['class' => BulmaClass::MENU]);
        $this->renderTestPage('Test - Menu', $content);
    }

    // Test footer
    public function footer()
    {
        $footer_content = Bulma::Container(
            HTML::p('This is a test footer content. © 2025 Mortingen Framework. All rights reserved.')
        );
        $content = Bulma::Footer($footer_content);
        $this->renderTestPage('Test - Footer', $content);
    }

    // Test columns
    public function columns()
    {
        $content = Bulma::Cols(View::concat(
            Bulma::Col(Bulma::Notification('First column', false, [BulmaClass::IS_PRIMARY])),
            Bulma::Col(Bulma::Notification('Second column', false, [BulmaClass::IS_SUCCESS])),
            Bulma::Col(Bulma::Notification('Third column', false, [BulmaClass::IS_INFO])),
            Bulma::Col(Bulma::Notification('Fourth column', false, [BulmaClass::IS_DANGER]))
        ));
        $this->renderTestPage('Test - Columns', $content);
    }

    // Test box
    public function box()
    {
        $content = Bulma::Box('This is a simple box. You can put any content inside.');
        $this->renderTestPage('Test - Box', $content);
    }

    // Test radio
    public function radio()
    {
        $radio_group = Bulma::Field(View::concat(
            Bulma::Label("Do you accept?"),
            Bulma::Control(View::concat(
                Bulma::Radio(
                    'Yes',
                    ['name' => 'verify', 'value' => 'yes', 'checked' => true]
                ),
                Bulma::Radio(
                    'No',
                    ['name' => 'verify', 'value' => 'no']
                ),
                Bulma::Radio(
                    'Undecided',
                    ['name' => 'verify', 'value' => 'undecided', 'disabled' => true]
                )
            ))
        ));

        $content = View::concat(
            Bulma::Title('Radio Buttons'),
            $radio_group
        );

        $this->renderTestPage('Test - Radio Buttons', $content);
    }

    // Test dropdown
    public function dropdown()
    {
        $triggerButton = Bulma::Button(
            View::concat(
                'Hover Me!',
                Bulma::Icon('fas fa-angle-down', ['is-small'])
            ),
            [],
            ['aria-haspopup' => 'true', 'aria-controls' => 'dropdown-menu']
        );

        $dropdownContent = View::concat(
            Bulma::NavbarItem('Dropdown item 1', true, '#', [BulmaClass::DROPDOWN_ITEM]),
            Bulma::NavbarItem('Other dropdown item', true, '#', [BulmaClass::DROPDOWN_ITEM]),
            HTML::hr([], ["class" => BulmaClass::DROPDOWN_DIVIDER]),
            Bulma::NavbarItem('With a divider', true, '#', [BulmaClass::DROPDOWN_ITEM])
        );

        $dropdown = Bulma::Dropdown($triggerButton, $dropdownContent);

        $content = View::concat(
            Bulma::Title('Dropdown Component'),
            $dropdown
        );

        $this->renderTestPage('Test - Dropdown', $content);
    }

    // Test level
    public function level()
    {
        $level1_left = Bulma::LevelItem(View::concat(
            HTML::p('Tweets', ['class' => 'heading']),
            HTML::p('3,456', ['class' => 'title'])
        ));
        $level1_center = Bulma::LevelItem(View::concat(
            HTML::p('Following', ['class' => 'heading']),
            HTML::p('123', ['class' => 'title'])
        ));
        $level1_right = Bulma::LevelItem(View::concat(
            HTML::p('Followers', ['class' => 'heading']),
            HTML::p('456K', ['class' => 'title'])
        ));

        $level1 = Bulma::Level(
            View::concat($level1_left, $level1_center, $level1_right),
            ''
        );

        $level2_left = Bulma::LevelItem(Bulma::Title('My Awesome Blog', '3'));
        $level2_center = Bulma::LevelItem(
            Bulma::Field(Bulma::Control(Bulma::Input(['type' => 'text', 'placeholder' => 'Find a post'])), [BulmaClass::HAS_ADDONS])
        );
        $level2_right = Bulma::LevelItem(Bulma::Button('Search', [BulmaClass::IS_PRIMARY]));

        $level2 = Bulma::Level($level2_left, View::concat($level2_center, $level2_right));

        $content = View::concat(
            Bulma::Title('Level for Stats'),
            Bulma::Box($level1),
            HTML::br(),
            Bulma::Title('Level for Actions'),
            Bulma::Box($level2)
        );

        $this->renderTestPage('Test - Level Component', $content);
    }

    // Test file upload
    public function file()
    {
        $file1 = Bulma::File('Choose a file…', 'resume');
        $file2 = Bulma::File('Choose a file…', 'avatar', [BulmaClass::IS_BOXED, BulmaClass::IS_SUCCESS]);
        $file3 = Bulma::File('Choose a file…', 'document', [BulmaClass::IS_BOXED, BulmaClass::IS_FULLWIDTH]);

        $content = View::concat(
            Bulma::Title('File Upload Component'),
            Bulma::Field($file1),
            HTML::br(),
            Bulma::Title('File Boxed'),
            Bulma::Field($file2),
            HTML::br(),
            Bulma::Title('File Fullwidth'),
            Bulma::Field($file3)
        );

        $this->renderTestPage('Test - File Upload', $content);
    }

    // Test media
    public function media()
    {
        $media_left = Bulma::MediaLeft(
            Bulma::Image('https://haruncan.com/wp-content/uploads/2015/10/3047577-poster-p-1-mr-robot-on-usa.jpg', 'Avatar', [BulmaClass::IS_128X128])
        );

        $media_content_text = View::concat(
            HTML::strong('Mr. Robot'),
            ' ',
            HTML::small('@babyrobot'),
            HTML::br([]),
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.'
        );
        $media_content = Bulma::MediaContent($media_content_text);

        $media_right = Bulma::MediaRight(
            Bulma::Button('', [BulmaClass::DELETE])
        );

        $media1 = Bulma::Media(View::concat($media_left, $media_content, $media_right));
        $reply_media_left = Bulma::MediaLeft(
            Bulma::Image('https://avatars.githubusercontent.com/u/141811535?v=4', 'Avatar', [BulmaClass::IS_64X64])
        );
        $reply_media_content_text = View::concat(
            HTML::strong('Burak'),
            ' ',
            HTML::small('@erimburak'),
            HTML::br([]),
            'Donec sollicitudin, erat vel malessuadablandit, justoMauris.'
        );
        $reply_media_content = Bulma::MediaContent($reply_media_content_text);
        $reply_media = Bulma::Media(View::concat($reply_media_left, $reply_media_content));

        // Nested media
        $media_with_reply_content = Bulma::MediaContent(View::concat(
            $media_content_text,
            $reply_media
        ));
        $media2 = Bulma::Media(View::concat($media_left, $media_with_reply_content, $media_right));

        $content = View::concat(
            Bulma::Title('Simple Media Object'),
            Bulma::Box($media1),
            HTML::br([]),
            Bulma::Title('Nested Media Object'),
            Bulma::Box($media2)
        );

        $this->renderTestPage('Test - Media Object', $content);
    }

    // Test checkbox
    public function checkbox()
    {
        $field = Bulma::Field(View::concat(
            Bulma::Control(
                Bulma::Checkbox(
                    'Remember me',
                    ['name' => 'remember_me', 'value' => '1']
                )
            ),
            Bulma::Control(
                Bulma::Checkbox(
                    'I have read and accept the terms',
                    ['name' => 'terms', 'value' => 'accepted', 'checked' => true]
                )
            ),
            Bulma::Control(
                Bulma::Checkbox(
                    'Send promotional emails (Disabled)',
                    ['name' => 'promo', 'value' => 'yes', 'disabled' => true]
                )
            )
        ));

        $content = View::concat(
            Bulma::Title('Checkbox Component'),
            $field
        );

        $this->renderTestPage('Test - Checkbox', $content);
    }

    // Test select
    public function select()
    {
        $options = View::concat(
            HTML::option('Select a country'),
            HTML::option('Turkey'),
            HTML::option('Germany'),
            HTML::option('Japan'),
            HTML::option('Canada')
        );

        $select_component = Bulma::Field(
            Bulma::Control(
                Bulma::Select($options)
            )
        );

        $select_colored = Bulma::Field(
            Bulma::Control(
                Bulma::Select($options, [], [BulmaClass::IS_SUCCESS])
            )
        );

        $select_rounded = Bulma::Field(
            Bulma::Control(
                Bulma::Select($options, [], [BulmaClass::IS_ROUNDED])
            )
        );

        $content = View::concat(
            Bulma::Title('Standard Select'),
            $select_component,
            HTML::br(),
            Bulma::Title('Colored Select'),
            $select_colored,
            HTML::br(),
            Bulma::Title('Rounded Select'),
            $select_rounded
        );

        $this->renderTestPage('Test - Select Component', $content);
    }
}
