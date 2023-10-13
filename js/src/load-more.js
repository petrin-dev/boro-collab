document.querySelectorAll('.view-more-query').forEach(function (element) {
  element.addEventListener('click', function (e) {
      e.preventDefault();

      const self = this;
      const queryEl = this.closest('.wp-block-query');
      const postTemplateEl = queryEl.querySelector('.wp-block-post-template');

      if (queryEl && postTemplateEl) {
          const blockAttr = queryEl.getAttribute('data-attrs');

          if (blockAttr) {
              const block = JSON.parse(blockAttr);
              const maxPages = (block && block.attrs && block.attrs.query && block.attrs.query.pages) || 0;

              const ajaxUrl = '/wp-admin/admin-ajax.php'; // WordPress AJAX URL

              const xhr = new XMLHttpRequest();
              xhr.open('GET', ajaxUrl + '?action=query_render_more_pagination&attrs=' + encodeURIComponent(blockAttr) + '&paged=' + encodeURIComponent(queryEl.getAttribute('data-paged')), true);
              xhr.setRequestHeader('Content-Type', 'application/json; charset=UTF-8');

              xhr.onload = function () {
                  const nextPage = Number(queryEl.getAttribute('data-paged')) + 1;

                  if (maxPages > 0 && nextPage >= maxPages) {
                      // Hide the "View More" button
                      self.closest('.view-more-container').style.display = 'none';

                      // Display the "No More" message here if needed
                      const noMoreMessage = document.querySelector('.no-more-posts');
                      if (noMoreMessage) {
                          noMoreMessage.style.display = 'block';
                      }
                  }

                  queryEl.setAttribute('data-paged', nextPage);

                  if (xhr.status === 200 && xhr.getResponseHeader('content-type').includes('application/json')) {
                      try {
                          const responseJSON = JSON.parse(xhr.responseText);
                          console.log(responseJSON);
                      } catch (error) {
                          console.error('Error parsing JSON response:', error);
                      }
                  } else {
                      handleHTMLResponse(xhr.responseText);
                  }
              };

              xhr.send();
          }
      }
  });
});
