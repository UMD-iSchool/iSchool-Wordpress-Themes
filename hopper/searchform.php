<?php $search_text = empty($_GET['s']) ? ('Search') : get_search_query(); ?> 
<div id="search" title="<?php _e('Type and hit enter', 'hopper'); ?>">
    <form method="get" id="searchform" action="<?php echo esc_url(home_url('/'));; ?>"> 
        <input type="text" value="<?php echo $search_text; ?>" 
            name="s" id="s"  onblur="if (this.value == '')  {this.value = '<?php echo $search_text; ?>';}"  
            onfocus="if (this.value == '<?php echo $search_text; ?>') {this.value = '';}" 
        />
    </form>
</div><!-- #search -->