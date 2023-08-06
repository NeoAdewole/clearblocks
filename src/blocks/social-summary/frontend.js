import Rating from '@mui/material/Rating/index.js'
import { render, useState, useEffect } from '@wordpress/element'
import apiFetch from '@wordpress/api-fetch'

function SocialRating(props) {
  const [avgRating, setAvgRating] = useState(props.avgRating)
  const [permission, setPermission] = useState(props.loggedIn)
  useEffect(() => {
    if (props.ratingCount) {
      setPermission(false)
    }
  })
  return (
    <Rating
      value={avgRating}
      precision={0.5}
      onChange={async (event, rating) => {
        if (!permission) {
          return alert('You have already rated this post or you may need to log in.')
        }
        setPermission(false)

        const response = await apiFetch({
          path: 'ccb/v1/rate',
          method: 'POST',
          data: {
            postID: props.postID,
            rating
          }
        })

        if (response.status == 2) {
          setAvgRating(response.rating)
        }

      }}
    />
  )

}

document.addEventListener('DOMContentLoaded', event => {
  const block = document.querySelector('#social-rating')
  const postID = parseInt(block.dataset.postId)
  const avgRating = parseFloat(block.dataset.avgRating)
  const loggedIn = !!block.dataset.loggedIn
  // The double negation operator !! converts a value into a boolean value
  const ratingCount = !!parseInt(block.dataset.ratingCount)

  render(
    <SocialRating
      postID={postID}
      avgRating={avgRating}
      loggedIn={loggedIn}
      ratingCount={ratingCount}
    />,
    block
  )
})