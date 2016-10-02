<?php use App\Application as Application; ?>

<h1>Dessign settings</h1>


<?php 
    $Tempaltes = $this->getTemplates();
    foreach ($Tempaltes as $Template):  
?>

    <a href="?p=<?php echo Application::$Configuration->AdminPage; ?>&open=design_settings&name=<?php echo $Template->Name ?>">
        <span class="template-title"><?php echo $Template->Name ?></span>
        <img src="<?php echo $Template->Preview ?>" class="template-box-select" />
    </a>

<?php endforeach; ?>
