<h1>$Title</h1>

<% if NestedParent %>
    <% with NestedParent %>
        <div>Go back: <a href="{$Link}">$Title</a></div>
    <% end_with %>
<% end_if %>

<div style="margin: 1rem 0">$Content</div>

<% if List %>
<%-- To display paginated list: --%>
<ul>
    <% loop List %>
        <li><a href="{$Link}">$Title</a></li>
    <% end_loop %>
</ul>
<% include Goldfinch/Nest/Partials/Pagination NestedList=$List %>
<%-- To display loadable list: --%>
<%-- $LoadableAs(Goldfinch\Component\Blog\Models\Nest\BlogCategory, $ID, List) --%>
<% else %>
<p>Sorry, no blog in <strong>$Title</strong> at this moment.</p>
<% end_if %>

<div style="display: flex; width: 100%; padding-top: 20px">
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

<% if OtherCategories %>
<hr>
<div>
    <h4>Other categories</h4>
    <ul>
        <% loop OtherCategories %>
        <li><a href="{$Link}">$Title</a></li>
        <% end_loop %>
    </ul>
</div>
<% end_if %>
