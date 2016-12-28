<div class="container">
    <h1 class="center">Amirkabir Studio API</h1>

    <h3 class="title">Making Requests</h3>
    <div class="desc">
        We support <span class="bold">GET</span> and <span class="bold">POST</span> HTTP methods in some cases. <br>
        The response contains a <span class="bold">JSON object</span> or <span class="bold">XML</span> depending on your request, which always has a Boolean field <code>‘ok’</code> and may have an optional String field <code>‘description’</code> with a human-readable description of the result. If <code>‘ok’</code> equals true, the request was successful and the result of the query can be found in the <code>‘result’</code> field. In case of an unsuccessful request, <code>‘ok’</code> equals false and the error is explained in the <code>‘description’</code>. An Integer <code>‘status’</code> field is also returned. <br>
        <span class="bold">*</span> All queries must be made using UTF-8.
    </div>

    <h3 class="title">Getting Results</h3>
    <div class="desc">
        You will receive <span title="bold">JSON-serialized</span> <a href="docs#object">Object</a> or <span title="bold">XML</span> with same structure as a result.

        <h4 class="sub-title" id="object">Object</h4>
        <div class="desc">
            Object represent a result. <br>
            At most <span class="bold">one</span> of the optional parameters can be present in any given object.
            <table class="api">
                <thead>
                    <tr>
                        <th>Field</th>
                        <th>Type</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>homepage</td>
                        <td><a href="docs#homepage">Homepage</a></td>
                        <td><span class="italic">Optional.</span> represents homepage data.</td>
                    </tr>
                    <tr>
                        <td>games</td>
                        <td>Array of <a href="docs#game">Game</a></td>
                        <td><span class="italic">Optional.</span> represents an array of games.</td>
                    </tr>
                    <tr>
                        <td>comments</td>
                        <td>Array of <a href="docs#comment">Comment</a></td>
                        <td><span class="italic">Optional.</span> represents an array of comments.</td>
                    </tr>
                    <tr>
                        <td>gallery</td>
                        <td><a href="docs#gallery">Gallery</a></td>
                        <td><span class="italic">Optional.</span> represents gallery items for specific a game.</td>
                    </tr>
                    <tr>
                        <td>game</td>
                        <td><a href="docs#game">Game</a></td>
                        <td><span class="italic">Optional.</span> represents details of a specific game.</td>
                    </tr>
                    <tr>
                        <td>leaderboard</td>
                        <td>Array of <a href="record">Record</a></td>
                        <td><span class="italic">Optional.</span> represents players records in specific game.</td>
                    </tr>
                    <tr>
                        <td>games_list</td>
                        <td><a href="docs#games_list">GamesList</a></td>
                        <td><span class="italic">Optional.</span> represents details of a specific game.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <h3 class="title">Available Types</h3>
    <div class="desc">
        All types used in the Amirkabir Studio API responses are represented as <span class="bold">JSON objects</span> or <span class="bold">XMLs</span> depending on your request. <br>
        Their structure are same.

        <h4 class="sub-title" id="homepage">Homepage</h4>
        <div class="desc">
            This object represents needed data for Amirkabir Studio homepage.
            <table class="api">
                <thead>
                <tr>
                    <th>Field</th>
                    <th>Type</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>slider</td>
                    <td>Array of <a href="docs#game">Game</a></td>
                    <td>Represents an array of games.</td>
                </tr>
                <tr>
                    <td>new_games</td>
                    <td>Array of <a href="docs#game">Game</a></td>
                    <td>Represents an array of games.</td>
                </tr>
                <tr>
                    <td>comments</td>
                    <td>Array of <a href="docs#comment">Comment</a></td>
                    <td>Represents an array of comments.</td>
                </tr>
                <tr>
                    <td>tutorials</td>
                    <td><a href="docs#tutorial">Tutorial</a></td>
                    <td>Represents an array of tutorials</td>
                </tr>
                </tbody>
            </table>
        </div>

        <h4 class="sub-title" id="game">Game</h4>
        <div class="desc">
            This object represents a game data.
            <table class="api">
                <thead>
                <tr>
                    <th>Field</th>
                    <th>Type</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>title</td>
                    <td>String</td>
                    <td>Title of the game</td>
                </tr>
                <tr>
                    <td>abstract</td>
                    <td>HTML text</td>
                    <td>A brief explanation about the game</td>
                </tr>
                <tr>
                    <td>info</td>
                    <td>HTML text</td>
                    <td>Complete explanation about the game</td>
                </tr>
                <tr>
                    <td>rate</td>
                    <td>Decimal 2,1 (0.0 to 5.0)</td>
                    <td>Average rate according to players rates (comments)</td>
                </tr>
                <tr>
                    <td>large_image</td>
                    <td>URL</td>
                    <td>The game's large-sized image proper for homepage's slider</td>
                </tr>
                <tr>
                    <td>small_image</td>
                    <td>URL</td>
                    <td>The game's small-sized image</td>
                </tr>
                <tr>
                    <td>number_of_comments</td>
                    <td>Integer</td>
                    <td>The number of game's comments</td>
                </tr>
                <tr>
                    <td>categories</td>
                    <td>Array of <a href="docs#category">Category</a></td>
                    <td>represents an array consisting of game's categories</td>
                </tr>
                </tbody>
            </table>
        </div>

        <h4 class="sub-title" id="comment">Comment</h4>
        <div class="desc">
            This object represents a comment left for a game.
            <table class="api">
                <thead>
                <tr>
                    <th>Field</th>
                    <th>Type</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>text</td>
                    <td>String</td>
                    <td>Comment text</td>
                </tr>
                <tr>
                    <td>rate</td>
                    <td>Integer (1-5)</td>
                    <td>A rate that a player gave to the game</td>
                </tr>
                <tr>
                    <td>date</td>
                    <td>String</td>
                    <td>Jalali date</td>
                </tr>
                <tr>
                    <td>player</td>
                    <td><a href="docs#player">Player</a></td>
                    <td>Player that left the comment</td>
                </tr>
                <tr>
                    <td>game</td>
                    <td><a href="docs#game">Game</a></td>
                    <td>The game that the comment left on.</td>
                </tr>
                </tbody>
            </table>
        </div>

        <h4 class="sub-title" id="tutorial">Tutorial</h4>
        <div class="desc">
            This object represents a tutorial wrote for a game.
            <table class="api">
                <thead>
                <tr>
                    <th>Field</th>
                    <th>Type</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>title</td>
                    <td>String</td>
                    <td>Tutorial's title</td>
                </tr>
                <tr>
                    <td>date</td>
                    <td>String</td>
                    <td>Jalali date</td>
                </tr>
                <tr>
                    <td>game</td>
                    <td><a href="docs#game">Game</a></td>
                    <td>The game that the comment left on.</td>
                </tr>
                </tbody>
            </table>
        </div>

        <h4 class="sub-title" id="games_list">GamesList</h4>
        <div class="desc">
            This object represents a list of games according to specific filters. <br>
            <table class="api">
                <thead>
                <tr>
                    <th>Field</th>
                    <th>Type</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>count</td>
                    <td>Integer</td>
                    <td>number of games with specific filters.</td>
                </tr>
                <tr>
                    <td>games</td>
                    <td>Array of <a href="docs#game">Game</a></td>
                    <td>Array of games with specific filters.</td>
                </tr>
                </tbody>
            </table>
        </div>

        <h4 class="sub-title" id="player">Player</h4>
        <div class="desc">
            This object represents a player.
            <table class="api">
                <thead>
                <tr>
                    <th>Field</th>
                    <th>Type</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>name</td>
                    <td>String</td>
                    <td>Player's name</td>
                </tr>
                <tr>
                    <td>avatar</td>
                    <td>URL</td>
                    <td>Player's profile picture</td>
                </tr>
                </tbody>
            </table>
        </div>

        <h4 class="sub-title" id="category">Category</h4>
        <div class="desc">
            This object represents a category.
            <table class="api">
                <thead>
                <tr>
                    <th>Field</th>
                    <th>Type</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>name</td>
                    <td>String</td>
                    <td>Category's name</td>
                </tr>
                </tbody>
            </table>
        </div>

        <h4 class="sub-title" id="record">Record</h4>
        <div class="desc">
            This object represents a game record.
            <table class="api">
                <thead>
                <tr>
                    <th>Field</th>
                    <th>Type</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>player</td>
                    <td><a href="docs#player">Player</a></td>
                    <td>Player whose record belong to.</td>
                </tr>
                <tr>
                    <td>score</td>
                    <td>Integer</td>
                    <td>Player's score in a specific game</td>
                </tr>
                <tr>
                    <td>level</td>
                    <td>Integer</td>
                    <td>Player's level in a specific game</td>
                </tr>
                <tr>
                    <td>displacement</td>
                    <td>Integer</td>
                    <td>Player's displacement in a specific game's leaderboard</td>
                </tr>
                </tbody>
            </table>
        </div>

        <h4 class="sub-title" id="gallery">Gallery</h4>
        <div class="desc">
            This object represents videos and images for a specific game.
            <table class="api">
                <thead>
                <tr>
                    <th>Field</th>
                    <th>Type</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>images</td>
                    <td>Array of <a href="docs#imgvid">Image</a></td>
                    <td>Game's images</td>
                </tr>
                <tr>
                    <td>videos</td>
                    <td>Array of <a href="docs#imgvid">Video</a></td>
                    <td>Game's videos</td>
                </tr>
                </tbody>
            </table>
        </div>

        <h4 class="sub-title" id="imgvid">Image , Video</h4>
        <div class="desc">
            This object represents videos and images for a specific game.
            <table class="api">
                <thead>
                <tr>
                    <th>Field</th>
                    <th>Type</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>title</td>
                    <td>String</td>
                    <td>Title of image or video</td>
                </tr>
                <tr>
                    <td>views</td>
                    <td>Integer</td>
                    <td>number of views for image or video</td>
                </tr>
                <tr>
                    <td>url</td>
                    <td>URL</td>
                    <td>URL of image or video</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <h3 class="title">Examples</h3>
    <div class="desc">
        <ul>
            <li>Get Homepage data:
                <ul>
                    <li>XML: <a href="<?php echo getenv('URL') ?>home.xml"><?php echo getenv('URL') ?>home.xml</a></li>
                    <li>JSON: <a href="<?php echo getenv('URL') ?>home.json"><?php echo getenv('URL') ?>home.json</a></li>
                </ul>
            </li>
            <li>Get Header data for 'بازی The Last Guardian':
                <ul>
                    <li>XML: <a href="<?php echo getenv('URL') ?>games/بازی The Last Guardian/header.xml"><?php echo getenv('URL') ?>games/بازی The Last Guardian/header.xml</a></li>
                    <li>JSON: <a href="<?php echo getenv('URL') ?>games/بازی The Last Guardian/header.json"><?php echo getenv('URL') ?>games/بازی The Last Guardian/header.json</a></li>
                </ul>
            </li>
            <li>Search games containing '2':
                <ul>
                    <li>XML: <a href="<?php echo getenv('URL') ?>games.xml?q=2"><?php echo getenv('URL') ?>games.xml?q=2</a></li>
                    <li>JSON: <a href="<?php echo getenv('URL') ?>games.json?q=2"><?php echo getenv('URL') ?>games.json?q=2</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <h3 class="title" id="how-to-work-with-games-list-api">How to send create and send request for games_list API?</h3>
    <div class="desc">
        You should create a 'filters' object in JS and POST it to the games_list API. It should have following format: <br>
        <pre>
var filters = {
    rates: [],
    categories: []
}</pre>
        <ul>
            <li>JSON API: <?php echo getenv('URL') ?>games_list.json?offset=&lt;offset&gt;</li>
            <li>XML API: <?php echo getenv('URL') ?>games_list.xml?offset=&lt;offset&gt;</li>
        </ul>
        <ul>
            <li>Usefull links
            <ul>
                <li><a href="https://laracasts.com/discuss/channels/general-discussion/how-can-i-send-a-jquery-object-via-post">how can i send a jquery object via post</a></li>
                <li><a href="http://stackoverflow.com/questions/4255848/javascript-pass-object-via-post">javascript pass object via post</a></li>
            <ul>
            </li>
        </ul>
    </div>
</div>
<div class="footer">
    Powered by <a href="https://github.com/ehsanm94/zaferoon">Zaferoon</a> - Seyyed Ehsan Mokhtari
</div>
