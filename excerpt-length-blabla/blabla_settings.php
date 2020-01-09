<?php

class Excerpt_length_blabla_settings
{
    public function __construct()
    {
        ?>
        <h1>blabla settings</h1>
        <form method="post" action="options.php">
        <?php settings_fields( 'blabla_settings_group' ); ?>
        <?php do_settings_sections( 'blabla_settings_group' ); ?>
            <label>Choisir la longueur des extraits</label>
            <input type="number" name="excerpt_length" value="<?php echo esc_attr( get_option('excerpt_length') ); ?>" />
            <?php submit_button(); ?>
        </form>
        <?php
    }
}