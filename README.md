# A extension for a badge for the navigation and the product detail page for Shopware 6

A extension for a _badge for the navigation and the product detail page_.
The text from the custom badge is set at the custom fields at the product.
The background color and the font color of the badge could be set over the 
configuration or at the product. The custom badge is also displayed when 
assigning a product page layout. When you increase the value from the constant 
_NUMBER_BADGES_ in the file _SschreierProductBadge.php_ in the _src_-directory 
before the installation, you can add so much badges as you like.

## Possible Badges
- Discount badge
- Top seller badge
- New badge
- Out of stock badge
- Custom badge

## Possible Configurations 
 - select, if any of the badges should be shown in the category lists
 - select, if any of the badges should be shown on the product detail page
 - select, if the colors of the custom or out-of-stock badge should be set via the configuration
 - set the background color of the custom or out-of-stock badge
 - set the font color of the custom or out-of-stock badge

## Available snippets
 - badgeText
 - boxLabelDiscount

## How to install the extension
### via composer (recommended)

1. Make sure that `"packagist.org": false` is NOT disabled in your project composer.json
2. Add the package via composer `composer require flagbit/shopware-6-product-badge`
3. Refresh plugins `bin/console plugin:refresh`
4. Install and activate `bin/console plugin:install --activate SschreierProductBadge`

### via download & console

1. Download the latest _SschreierProductBadge-main.zip_.
2. Unzip the zip file and rename the folder to _SschreierProductBadge_. 
3. Move the folder to the project folder _custom/plugins/_ .
4. Connect to the console via ssh:

```
bin/console plugin:refresh
bin/console plugin:install --activate SschreierProductBadge
```

### via zip upload
1. Download the latest _SschreierProductBadge-main.zip_.
2. Unzip the zip file and rename the folder to _SschreierProductBadge_.
3. Zip the folder to _SschreierProductBadge.zip_.
4. Upload the zip in the Shopware Administration.
5. Install & Activate the extension.

## Images

### custom badge in navigation

![custom badge in navigation](https://www.sebastianschreier.de/plugins/SschreierBadgeNavigationProductDetailPage/SschreierBadgeNavigationProductDetailPage-Image1.jpg)

### custom badge on product detail page

![custom badge on product detail page](https://www.sebastianschreier.de/plugins/SschreierBadgeNavigationProductDetailPage/SschreierBadgeNavigationProductDetailPage-Image2.jpg)

### extension configuration part 1

![extension configuration part 1](https://www.sebastianschreier.de/plugins/SschreierBadgeNavigationProductDetailPage/SschreierBadgeNavigationProductDetailPage-Image3.jpg)

### extension configuration part 2

![extension configuration part 2](https://www.sebastianschreier.de/plugins/SschreierBadgeNavigationProductDetailPage/SschreierBadgeNavigationProductDetailPage-Image4.jpg)

### custom badge in shopware administration

![custom badge in shopware administration](https://www.sebastianschreier.de/plugins/SschreierBadgeNavigationProductDetailPage/SschreierBadgeNavigationProductDetailPage-Image5.jpg)
