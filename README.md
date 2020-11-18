# Magento 2 Promo Bar GraphQL/PWA

Mageplaza Promo Bar Extension supports getting and pushing data on the website with GraphQl, this support for PWA Studio.

## How to install

Run the following command in Magento 2 root folder:

```
composer require mageplaza/module-promo-bar-graphql
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy
```

**Note:**
Mageplaza Promo Bar GraphQL requires installing [Mageplaza Promo Bar](https://www.mageplaza.com/magento-2-promo-bar/) in your Magento installation.

## 2. How to use

To perform GraphQL queries in Magento, please do the following requirements:

- Use Magento 2.3.x or higher. Set your site to [developer mode](https://www.mageplaza.com/devdocs/enable-disable-developer-mode-magento-2.html).
- Set GraphQL endpoint as `http://<magento2-server>/graphql` in url box, click **Set endpoint**. 
(e.g. `http://dev.site.com/graphql`)
- To view the queries that the **Mageplaza Promo Bar GraphQL** extension supports, you can look in `Docs > Query` in the right corner

## 3. Devdocs

- [Promo Bar API & examples](https://documenter.getpostman.com/view/10589000/TVKEXxWj)
- [Promo Bar GraphQL & examples](https://documenter.getpostman.com/view/10589000/TVepA8tv)


## 4. Contribute to this module

Feel free to **Fork** and contribute to this module and create a pull request so we will merge your changes main branch.

## 5. Get Support

- Feel free to [contact us](https://www.mageplaza.com/contact.html) if you have any further questions.
- Like this project, Give us a **Star** ![star](https://i.imgur.com/S8e0ctO.png)
