# File structure and progress
- [readme.md](readme.md)
- [index.php](index.php)
- [.htaccess](.htaccess)
- [Config/](Config/)
  - [config.php](Config/config.php)
  - [database.php](Config/database.php)
- [Controllers/](Controllers/) 70%
  - [AdminController.php](Controllers/AdminController.php)
  - [CartController.php](Controllers/CartController.php)
  - [EventController.php](Controllers/EventController.php)
  - [InfoController.php](Controllers/InfoController.php)
  - [ItemsController.php](Controllers/ItemsController.php)
  - [UsersController.php](Controllers/UsersController.php)
  - [SiteController.php](Controllers/SiteController.php)
- [Core/](Core/) 90%
  - [Config.php](Core/Config.php)
  - [Controller.php](Core/Controller.php)
  - [Core.php](Core/Core.php)
  - [DB.php](Core/DB.php)
  - [Get.php](Core/Get.php)
  - [Model.php](Core/Model.php)
  - [Post.php](Core/Post.php)
  - [RequestMethods.php](Core/RequestMethods.php)
  - [Router.php](Core/Router.php)
  - [Session.php](Core/Session.php)
  - [Template.php](Core/Template.php)
- [css/](css/)
  - [error.css](css/error.css)
  - [login.css](css/login.css)
- [images/](images/)
  - [events/](images/events/)
    - [event2.jpg](images/events/event2.jpg)
  - [about.png](images/about.png)
  - [cart.png](images/cart.png)
  - [contacts.png](images/contacts.png)
  - [bouquet.png](images/bouquet.png)
  - [delivery.png](images/delivery.png)
  - [flower.png](images/flower.png)
  - [gift.png](images/gift.png)
  - [payment.png](images/payment.png)
- [js/](js/) 20%
  - [UserSettings.js](js/UserSettings.js)
- [Models/](Models/) 70%
  - [Cart.php](Models/Cart.php)
  - [Categories.php](Models/Categories.php)
  - [Event.php](Models/Event.php)
  - [Items.php](Models/Items.php)
  - [Users.php](Models/Users.php)
- [Views/](Views/) 75%
  - [Admin/](Views/Admin/)
    - [events.php](Views/Admin/events.php)
    - [products.php](Views/Admin/products.php)
    - [users.php](Views/Admin/users.php)
    - [index.php](Views/Admin/index.php)
  - [Cart/](Views/Cart/)
    - [index.php](Views/Cart/index.php)
  - [Event/](Views/Event/)
    - [index.php](Views/Event/index.php)
    - [add.php](Views/Event/add.php)
    - [edit.php](Views/Event/edit.php)
    - [show.php](Views/Event/show.php)
  - [Info/](Views/Info/)
    - [about.php](Views/Info/about.php)
    - [contacts.php](Views/Info/contacts.php)
    - [delivery.php](Views/Info/delivery.php)
    - [payment.php](Views/Info/payment.php)
  - [Items/](Views/Items/)
    - [index.php](Views/Items/index.php)
    - [add.php](Views/Items/add.php)
    - [item.php](Views/Items/item.php)
    - [bouquets.php](Views/Items/bouquets.php)
    - [flowers.php](Views/Items/flowers.php)
  - [Layouts/](Views/Layouts/)
    - [index.php](Views/Layouts/index.php)
  - [Site/](Views/Site/)
    - [index.php](Views/Site/index.php)
    - [error.php](Views/Site/error.php)
  - [Users/](Views/Users/)
    - [login.php](Views/Users/login.php)
    - [register.php](Views/Users/register.php)
    - [settings.php](Views/Users/settings.php)
    - [registersuccess.php](Views/Users/registersuccess.php)

# Project description

This is a simple online flower shop. The project is written in PHP and uses the MVC pattern. The project is not yet completed, but the main functionality is already implemented. The project has a user and admin part. The user can view the products, add them to the cart, and make an order. The admin can add, edit, and delete products. The project uses a MySQL database to store data. The project uses the following technologies: PHP, MySQL, HTML, CSS, JavaScript.

# Classes
- **Config.php** - The class is responsible for loading the configuration file.
- **Controller.php** - The class is responsible for the controller.
- **Core.php** - The class is responsible for the core of the project.
- **DB.php** - The class is responsible for connecting to the database.
- **Get.php** - The class is responsible for getting data from GET requests.
- **Model.php** - The class is responsible for the model.
- **Post.php** - The class is responsible for getting data from POST requests.
- **RequestMethods.php** - The class is responsible for getting data from requests.
- **Router.php** - The class is responsible for routing.
- **Session.php** - The class is responsible for working with sessions.
- **Template.php** - The class is responsible for working with templates.

# Controllers
- **AdminController.php** - The class is responsible for the admin part of the project.
- **CartController.php** - The class is responsible for the cart part of the project.
- **EventController.php** - The class is responsible for the event part of the project.
- **InfoController.php** - The class is responsible for the info part of the project.
- **ItemsController.php** - The class is responsible for the items part of the project.
- **UsersController.php** - The class is responsible for the users part of the project.
- **SiteController.php** - The class is responsible for the site part of the project.

# Models
- **Cart.php** - The class is responsible for the cart model.
- **Categories.php** - The class is responsible for the categories model.
- **Event.php** - The class is responsible for the event model.
- **Items.php** - The class is responsible for the items model.
- **Users.php** - The class is responsible for the users model.