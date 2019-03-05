<?php
if(!isset($_SESSION['userid'])) {
    header('Location: /login');
}
?>

<div class="header" id="headerBg">
    <h1>Shovel Knight</h1>
    
    <div class="go-down">
        <div class="arrow-down"></div>
    </div>
    <div class="raise-knight" id="raiseKnight"></div>
    <div class="knight" id="easterEgg"></div>
    <p class="psst" id="hint">Psst. Click on the Knight! ></p>
</div>
<div class="content">
    <a href='/gameCharacter/index'><h2>All Characters</h2></a>
    <a href='/gameCharacter/create'>
        <div class="new-character-wrapper">
            <div class="new-character-btn">
                <div></div>
                <div></div>
            </div>
            <h2>New Character</h2>
        </div>
    </a>
<a href="/login/logout" class="sign-out">Sign Out</a></p>
</div>