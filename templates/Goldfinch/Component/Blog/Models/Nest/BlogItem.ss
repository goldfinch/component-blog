<h1>$Title</h1>

<% if Parent %>
    <% with Parent %>
        <div>Go back: <a href="{$Link}">$Title</a></div>
    <% end_with %>
<% end_if %>

<% if Categories %>
    <div>Categories:
        <% loop Categories %><% if not IsFirst %>, <% end_if %><a href="{$Link}">$Title</a><% end_loop %>
    </div>
<% end_if %>

<div style="margin: 1rem 0">$Content</div>

<div style="display: flex">
    <div style="width: 50%">

        <% if PreviousItem %>
            <% with PreviousItem %>
                <a href="{$Link}">Previous ($Title)</a>
            <% end_with %>
        <% end_if %>

    </div>
    <div style="width: 50%">

        <% if NextItem %>
            <% with NextItem %>
                <a href="{$Link}">Next ($Title)</a>
            <% end_with %>
        <% end_if %>

    </div>
</div>

<% if OtherItems %>
<% with OtherItems %>
<hr>
<div>
    <h4>Other items (mix)</h4>
    <ul>
        <% loop Me %>
        <li><a href="{$Link}">$Title</a></li>
        <% end_loop %>
    </ul>
</div>
<% end_with %>
<% end_if %>

<% if OtherItems(inside, 3) %>
<% with OtherItems(inside, 3) %>
<hr>
<div>
    <h4>Other items (with the same categories)</h4>
    <ul>
        <% loop Me %>
        <li><a href="{$Link}">$Title</a></li>
        <% end_loop %>
    </ul>
</div>
<% end_with %>
<% end_if %>

<% if OtherItems(outside, 3) %>
<% with OtherItems(outside, 3) %>
<hr>
<div>
    <h4>Other items (with other categories)</h4>
    <ul>
        <% loop Me %>
        <li><a href="{$Link}">$Title</a></li>
        <% end_loop %>
    </ul>
</div>
<% end_with %>
<% end_if %>
