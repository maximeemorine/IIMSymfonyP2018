IIM Promo 2018 - Symfony

--
Maxime Emorine

- composer install
- php app/console doctrine:database:create
- php app/console doctrine:schema:update --dump-sql --force
- php app/console doctrine:fixtures:load




1) form login

- AppBundle\Controller\SecurityController
- provider: class AppBundle:User
- route : /login
- username: admin@admin.fr
- password: admin

2) form registration

- AppBundle\Controller\AccountController
- route: /inscription


3) Api

- /admin/lecons/api
- /admin/notes/api

--

Format used for the mapping information : YML
