<% if Items.Count %>
<div class="container">
  <div class="row justify-content-center my-5">
    <div class="col-md-8">
      <%-- Filter --%>
      <form>
        <div class="mb-3">
          <label for="blog-search-field" class="form-label">Search</label>
          <input
            class="form-control"
            list="datalistOptions"
            id="blog-search-field"
            placeholder="Search in blog..."
          />
        </div>
        <% if Categories %>
        <div class="mb-3">
          <select class="form-select" aria-label="Blog Categories">
            <option selected>-</option>
            <% loop Categories %>
            <option value="$URLSegment">$Title</option>
            <% end_loop %>
          </select>
        </div>
        <% end_if %>
        <% if Tags %>
        <div class="mb-3">
          <select class="form-select" aria-label="Blog Tags">
            <option selected>-</option>
            <% loop Tags %>
            <option value="$ID">$Title</option>
            <% end_loop %>
          </select>
        </div>
        <% end_if %>
      </form>

      <div class="accordion" id="blogblock-{$Top.ID}">
        <% loop Items %>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button
              class="accordion-button"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#blogblock-{$Top.ID}-item-{$ID}"
              aria-expanded="false"
              aria-controls="blogblock-{$Top.ID}-item-{$ID}"
            >
              $Title
            </button>
          </h2>
          <div
            id="blogblock-{$Top.ID}-item-{$ID}"
            class="accordion-collapse collapse"
            data-bs-parent="#blogblock-{$Top.ID}"
          >
            <div class="accordion-body"><a href="{$Link}">$Title</a></div>
          </div>
        </div>
        <% end_loop %>
      </div>
    </div>
  </div>
</div>
<% end_if %>
