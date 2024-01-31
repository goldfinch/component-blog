<form method="GET" id="myform" style="display: block; margin-bottom: 70px">
  <div style="margin-bottom: 10px">
    <input type="text" class="text" name="search" placeholder="Search" value="{$paramGet(search)}">
  </div>
  <% if Categories %>
    <div>
      <select name="category">
      <option value>Select category</option>
      <% loop Categories %><option value="{$URLSegment}"<% if paramGet(category) == $URLSegment %> selected<% end_if %>>$Title</option><% end_loop %>
      </select>
    </div>
<% end_if %>
  <input type="submit" value="Search">
  <% if paramGet(search) || paramGet(category) %><input type="reset" value="Reset" onclick="window.location.search = ''; window.location.href = window.location.href.replace(window.location.search, '')"><% end_if %>
</form>

<% if NestedList && paramGet(search) || paramGet(category) %>
  <p>$NestedList.Count  <% if $NestedList.Count == 1 %>result has<% else %>results have<% end_if %> been found</p>
<% end_if %>
