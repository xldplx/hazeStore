    <?php include "config.php";

            $sql = "SELECT g.*, gr.name AS genre_name, p.name AS platform_name
                FROM games g
                INNER JOIN genres gr ON g.genre_id = gr.genre_id
                INNER JOIN platforms p ON g.platform_id = p.platform_id";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {

                    $game_id = $row["game_id"];
                    $title = $row["title"];
                    $genre_name = $row["genre_name"];
                    $release_year = $row["release_year"];  
                    $price = $row["price"];
                    $description = $row["description"];
                    $platform_name = $row["platform_name"];
                    
            ?>
                <?php

                        echo "<div class='rounded-lg shadow-xl border-2 max-w-[20rem] justify-between items-start max-h-[40rem] flex flex-col gap-1 py-4 px-6'>";
                            echo "<div class='w-[250px] h-[250px] rounded-lg self-center flex items-center justify-center text-[4rem] font-bold shadow-lg'>?</div>";
                            echo "<div class='flex flex-col'>";
                                echo "<h1 class='text-[2rem]''>$title</h1>";    
                                echo "<h1 class='italic'>$genre_name</h1>";
                            echo "</div>";
                            if (isset($description) && !empty($description)) {
                                echo "<h1>$description</h1>";
                            }
                            echo "<h1 class='text-green-400 font-bold text-[1.2rem]'>$$price</h1>";
                            echo "<div class='flex gap-4 justify-around'>";
                            echo "<button class='border-2 px-[2rem] py-[0.5rem] text-transparent rounded-lg bg-gradient-to-br from-pink-400 to-pink-800 bg-clip-text'>Add to Cart</button>";
                                echo "<button class='shadow-lg px-[2rem] py-[0.5rem] rounded-lg bg-gradient-to-br from-pink-400 to-pink-800 text-white'>Buy Now</button>";
                            echo "</div>";
                        echo "</div>";

                }
            } else {
                echo "No games found";
            }          
            
            $conn->close();
            ?>