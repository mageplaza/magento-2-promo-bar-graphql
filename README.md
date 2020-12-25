# Magento 2 Promo Bar GraphQL/PWA

**Magento 2 Promo Bar GraphQL is now a part of the Mageplaza Promo Bar extension that adds GraphQL features. The extension enables getting and pushing data on the website with GraphQL. And this incredibly supports PWA Studio.** 

[Mageplaza Promo Bar for Magento 2](https://www.mageplaza.com/magento-2-promo-bar/) enables online store owners to get their customers updated and well-informed about any promotion campaigns, discounts, or events on the store. This is an effective way to create customer engagement by drawing their attention at first. 

With the help of this extension, you can create and display unlimited promo banners on any page of your website. Because you might run different campaigns at the same time, this feature is incredibly helpful to notify customers about all your promotions at the same place without confusing them by including them all in a long text announcement. 

Besides, from the admin backend, you can set the conditions based on the cart or product conditions to display promo bars. You set the conditions at the backend configuration and the conditions are met, the related promo banners will be shown. For example, when customers add an item in a specific category to their cart, the promo banner of this category will be visible to them. In addition, the store admins can also set up the promo banners for conditions according to different periods. Then when a specific period comes, the corresponding promo bar will be activated automatically. 

Though the raw function of a promo banner is to notify customers about promotions or special offers, it should be visually-attractive enough to draw customers’ attention and make them curious about the content behind the banner. Fortunately, the Mageplaza Promo Bar extension makes it easy for you to customize the promo banners to your own style. Accordingly, you can choose all elements for your promo banners, including content, URL, text color, background color, URL text background color, and more.

In addition, because you can show multiple promo banners at once, it can be a bit confusing and messy if the promo banners are not displayed appropriately in turn. Therefore, the extension enables you to display the promo banners in slider mode or separately. This will make your promo banners appear in a more organized and easy-to-see way.


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

Feel free to **Fork** and contribute to this module. 
You can create a pull request so we will merge your changes main branch.

## 5. Get Support

- Feel free to [contact us](https://www.mageplaza.com/contact.html) if you have any further questions.
- Like this project, Give us a **Star** ![star](https://i.imgur.com/S8e0ctO.png)
