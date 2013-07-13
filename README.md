Get Post Gallery Images
=======================

The Wordpress plugin to fetch all gallery photos from post/page

0.1 ver.
--------
Images fetching in an associative array of three sizes: "Thumbnail", "Medium", "Full".


How to use
----------
For the instance this is just images list generation for the Imageflow gallery:

    <div id="gal" class="imageflow">
        <?php if (have_posts()) : while (have_posts()) : the_post();?>
            <?php $galleryImages = get_post_gallery_images(); 
              $imagesCount = count($galleryImages);
            ?>
            <?php if ($imagesCount > 0) : ?>
                  <?php for ($i = 0; $i < $imagesCount; $i++): ?>
                      <?php if (!empty($galleryImages[$i])) :?>
                        <img src="<?= $galleryImages[$i]['medium'][0];?>" longdesc="<?= $galleryImages[$i]['full'][0];?>"  />
                      <?php endif; ?>
                  <?php endfor; ?>
            <?php endif; ?>
        <?php endwhile; endif; ?>
    </div>

How to install
--------------
* Download plugin to your desktop.
* If downloaded as a zip archive, extract the Plugin folder to your desktop.
* Copy the Plugin folder to the wp-content/plugins folder in your WordPress directory.
* Go to Plugins screen and find the newly uploaded Plugin in the list.
* Click Activate Plugin to activate it.




