jQuery(document).ready(function($) {
  // トップページサービスセクションのモーダル
  $('.service-contents').on('click', function() {
    const name = $(this).data('name')
    const text = $(this).data('text')
    const imageUrl = $(this).data('image-url')

    $('#serviceModalImage').attr('src', imageUrl)
    $('#serviceModalImage').attr('alt', name)
    $('#serviceModalTitle').text(name)
    $('#serviceModalText').text(text)

    $('#serviceModal').addClass('active')
    $('body').addClass('no-scroll')
  });

  $('#serviceModalCloseBtn').on('click', function() {
    $('#serviceModal').removeClass('active')
    $('body').removeClass('no-scroll')
  })

  $('#serviceModal').on('click', function() {
    $('#serviceModal').removeClass('active')
    $('body').removeClass('no-scroll')
  })

  // モーダルのコンテンツ部分でクリックイベントが親要素へ伝播しないようにする
  $('.modal__body').on('click', function(event) {
    event.stopPropagation(); // イベントの伝播を停止
  })

  // メンバー一覧ページのモーダル
  $('.member-page__contents').on('click', function() {
    const memberImageUrl = $(this).data('member-image-url')
    const memberName = $(this).data('member-name')
    const memberNameEn = $(this).data('member-name-en')
    const memberPost = $(this).data('member-post')
    const memberText = $(this).data('member-text')

    $('#memberModalImage').attr('src', memberImageUrl)
    $('#memberModalImage').attr('alt', memberName)
    $('#memberModalName').text(memberName)
    $('#memberModalNameEn').text(memberNameEn)
    $('#memberModalPost').text(memberPost)
    $('#memberModalText').text(memberText)

    $('#memberModal').addClass('active')
    $('body').addClass('no-scroll')
  });

  $('#memberModalCloseBtn').on('click', function() {
    $('#memberModal').removeClass('active')
    $('body').removeClass('no-scroll')
  })

  $('#memberModal').on('click', function() {
    $('#memberModal').removeClass('active')
    $('body').removeClass('no-scroll')
  })

  // モーダルのコンテンツ部分でクリックイベントが親要素へ伝播しないようにする
  $('.modal__body').on('click', function(event) {
    event.stopPropagation(); // イベントの伝播を停止
  })

})