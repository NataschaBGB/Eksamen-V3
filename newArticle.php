<!-- form to insert new articles without going through the db manually -->
<?php
        if((isset($_SESSION['username']))) { ?>
            <div class="createArticle container">

                <h3 class="center errorMsg">Opret ny vare:</h3>
                <form action="includes/insert.php" method="post" enctype="multipart/form-data">

                    <div>
                        <label for="imgSrc">Billede</label>
                        <input type="file" name="imgSrc" id="imgSrc">
                    </div>
                    
                    <div>
                        <label for="imgAlt">Alt tekst</label>
                        <input type="text" id="imgAlt" name="imgAlt" placeholder="Billedets alttekst..." required>
                    </div>
                    
                    <div>
                        <label for="heading">Overskrift</label>
                        <input type="text" id="heading" name="heading" placeholder="Overskrift..." required>
                    </div>
                    
                    <div>
                        <label for="content">Brødtekst</label>
                        <textarea name="content" id="content" cols="30" rows="10" placeholder="Brødtekst..."></textarea>
                    </div>
                    
                    <div>
                        <label for="stars">Antal stjerner</label>
                        <select name="stars" id="stars">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="category">Kategori</label>
                        <select name="category" id="category" required>
                            <option value="Jakker">Jakker</option>
                            <option value="Bukser">Bukser</option>
                            <option value="Skjorter">Skjorter</option>
                            <option value="Strik">Strik</option>
                            <option value="Sko">Sko og støvler</option>
                            <option value="T-shirts">T-shirts og tanktops</option>
                            <option value="tasker">Tasker</option>
                        </select>
                    </div>

                    <div>
                        <label for="releaseDate">Dato for oprettelse</label>
                        <input type="date" id="releaseDate" name="releaseDate" placeholder="Vælg dato for oprettelse..." required>
                    </div>
                    
                    <div>
                        <input type="submit" value="Opret" name="value">
                    </div>
                </form>

            </div>
        
    <?php } ?>

    </div>