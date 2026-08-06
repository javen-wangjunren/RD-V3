<div class="reaction-time max-width-300 mx-auto">
	<div class="fs-24 fw-700 text-center">
		Was this article helpful?
	</div>
	<div class="mt-50 d-flex-all justify-center h-50px">
		<div class="reaction-icon mx-30 ajax-likes reaction-like" data-reaction="like">
			<svg width="18" height="21" viewBox="0 0 18 21" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M2 2V3" stroke="#A5B2BC" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M16 2V3" stroke="#A5B2BC" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M16 15C16 15 14 19 9 19C4 19 2 15 2 15" stroke="#A5B2BC" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		</div>
		<div class="reaction-icon mx-30 ajax-likes reaction-dislike" data-reaction="dislike">
			<svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M16 2V3" stroke="#A5B2BC" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M2 2V3" stroke="#A5B2BC" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M16 15C16 15 14 11 9 11C4 11 2 15 2 15" stroke="#A5B2BC" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		</div>
	</div>
	<div class="mt-50 fw-500 text-center">
		<span class="like-reaction"><?= get_field('likes_u78i')?></span> out of <span class="total-reaction"><?= (int)get_field('likes_u78i')+(int)get_field('dislikes_u78i')?></span> found this helpful
	</div>
</div>