<?php
$document = $PAGE["document"];
$data = $document->data;
global $CONTENT;
use Prismic\Dom\RichText;
?>

<header class="header" id="header">
	<nav class="c-224">
		<?php if (isset($data->pencil_bar_link[0])) { ?>
			<div class="pencil-bar fieldwork-reg" id="pencil-bar">
				<a href="<?php echo $data->pencil_bar_link[0]->text ?>" target="_blank"><span><?php echo $data->pencil_bar_text[0]->text ?></span></a>
			</div>
		<?php } else { ?>
			<div class="pencil-bar fieldwork-reg" id="pencil-bar">
				<span><?php echo $data->pencil_bar_text[0]->text ?></span>
			</div>
		<?php } ?>
		<div class="logo">
			<svg width="104" height="44" viewBox="0 0 104 44" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M26.2797 25.0495C25.1446 24.7354 24.2173 24.2787 23.4962 23.681C22.7758 23.0834 22.4156 22.3928 22.4148 21.6094L22.4125 17.7912H23.3287C23.6573 20.0094 24.3453 21.6086 25.3934 22.5865C26.4416 23.5653 27.9036 24.0535 29.7803 24.0527C31.0457 24.0527 32.0496 23.7795 32.7913 23.2354C33.533 22.6913 33.9034 21.9086 33.9026 20.8857C33.9026 20.0157 33.6285 19.2763 33.0835 18.6668C32.5377 18.0582 31.6863 17.3952 30.5291 16.6778L26.5016 14.2652C25.0388 13.4172 23.9962 12.5369 23.3745 11.6235C22.7521 10.7101 22.4401 9.64474 22.4401 8.42584C22.4393 6.70772 23.0981 5.34708 24.4187 4.34629C25.7386 3.3455 27.5221 2.84392 29.7701 2.84235C30.992 2.84235 32.1705 2.99904 33.3055 3.314C34.4397 3.62896 35.3678 4.08566 36.089 4.68251C36.8093 5.28094 37.1695 5.97071 37.1703 6.75418L37.1727 10.5715H36.2564C35.8836 8.3534 35.1956 6.75496 34.1917 5.77622C33.187 4.79747 31.834 4.30928 30.1318 4.31007C28.9533 4.31007 28.0205 4.59432 27.3333 5.15968C26.6461 5.72582 26.3026 6.49827 26.3033 7.47701C26.3033 8.32584 26.5711 9.02663 27.1066 9.58175C27.6414 10.1361 28.5094 10.7613 29.71 11.4566L33.7376 13.8369C35.2651 14.7282 36.3623 15.5928 37.0289 16.4298C37.6948 17.2668 38.0281 18.2731 38.0289 19.4479C38.0297 21.3409 37.3156 22.8259 35.8868 23.9031C34.4579 24.9802 32.4343 25.5204 29.8159 25.5212C28.594 25.5212 27.4147 25.3645 26.2804 25.0495H26.2797Z" fill="#3E3566"/>
				<path d="M41.3757 13.376C40.8513 12.1579 40.36 11.2996 39.9011 10.7988C39.4421 10.2988 38.9185 10.0272 38.3292 9.98387V9.36418L39.9003 9.29804C41.341 9.29804 42.5131 9.59096 43.4199 10.1776C44.3259 10.765 45.1394 11.8303 45.8598 13.3744L48.6456 19.606L50.8359 14.3839L50.377 13.3729C49.8526 12.1981 49.3613 11.35 48.9031 10.828C48.4442 10.3059 47.975 10.024 47.4948 9.98072V9.36103L48.7381 9.29489C50.2214 9.29489 51.4655 9.59253 52.4702 10.1902C53.4741 10.7886 54.3256 11.8484 55.0246 13.3705L58.0395 19.928L62.0275 9.61379H63.7621L57.7472 25.2792H56.2418L51.9812 16.113L48.1891 25.2847H46.716L41.3742 13.3776L41.3757 13.376Z" fill="#3E3566"/>
				<path d="M67.0774 24.2291C65.9423 23.5338 65.0632 22.5818 64.4408 21.3755C63.8184 20.1684 63.5064 18.8039 63.5056 17.281C63.5048 15.5842 63.8152 14.1377 64.436 12.9408C65.0577 11.744 65.9131 10.8353 67.0039 10.2149C68.0947 9.59438 69.3277 9.28335 70.702 9.28256C72.0551 9.28256 73.277 9.55343 74.3686 10.0967C75.4602 10.64 76.3219 11.407 76.9562 12.396C77.5897 13.3857 77.9064 14.522 77.9072 15.8054C77.9072 16.2188 77.8859 16.6865 77.8424 17.2086L77.7776 17.8613L67.9249 17.8669C67.9257 19.9338 68.2424 21.4401 68.8767 22.3858C69.5101 23.3314 70.394 23.8047 71.529 23.8039C72.5764 23.8039 73.4547 23.5692 74.164 23.1007C74.8725 22.633 75.555 21.9637 76.209 21.0929L77.224 21.8425C76.5913 22.822 75.8006 23.6385 74.852 24.2913C73.9034 24.9448 72.6317 25.2716 71.0393 25.2724C69.5338 25.2724 68.2132 24.9259 67.0781 24.2299L67.0774 24.2291ZM73.4887 16.3944C73.4879 14.3495 73.2462 12.8983 72.7667 12.0385C72.2857 11.1794 71.5985 10.7503 70.7036 10.7503C69.8743 10.7503 69.2029 11.1912 68.691 12.0731C68.1784 12.9542 67.9233 14.396 67.9241 16.3968L73.4887 16.3936V16.3944Z" fill="#3E3566"/>
				<path d="M82.1018 24.2212C80.9667 23.5259 80.0876 22.5739 79.4652 21.3676C78.8428 20.1605 78.5308 18.7959 78.53 17.2731C78.5292 15.5762 78.8396 14.1298 79.4605 12.9329C80.0821 11.7361 80.9375 10.8274 82.0283 10.2069C83.1191 9.58644 84.3521 9.27542 85.7265 9.27463C87.0795 9.27463 88.3014 9.54549 89.393 10.0888C90.4846 10.6321 91.3463 11.399 91.9806 12.388C92.6141 13.3778 92.9308 14.514 92.9316 15.7975C92.9316 16.2109 92.9103 16.6786 92.8668 17.2006L92.8021 17.8534L82.9493 17.8589C82.9501 19.9259 83.2668 21.4322 83.9011 22.3778C84.5345 23.3235 85.4184 23.7967 86.5534 23.796C87.6008 23.796 88.4791 23.5613 89.1884 23.0928C89.8969 22.6251 90.5794 21.9558 91.2334 21.0849L92.2484 21.8345C91.6157 22.8141 90.825 23.6306 89.8764 24.2834C88.9278 24.9369 87.6561 25.2637 86.0637 25.2645C84.5582 25.2645 83.2376 24.918 82.1026 24.2219L82.1018 24.2212ZM88.5131 16.3865C88.5123 14.3416 88.2706 12.8904 87.7912 12.0305C87.3101 11.1715 86.623 10.7424 85.728 10.7424C84.8987 10.7424 84.2273 11.1833 83.7155 12.0652C83.2028 12.9463 82.9477 14.388 82.9485 16.3888L88.5131 16.3857V16.3865Z" fill="#3E3566"/>
				<path d="M96.2419 24.0344C95.4118 23.2186 94.9971 22.0391 94.9963 20.4942L94.9916 11.0634H93.028V9.59571H94.9916L94.99 6.6579L96.6258 4.69884L99.2442 4.69727L99.2466 9.59178L102.848 9.5902V11.0587L99.2474 11.0603L99.2521 20.6863C99.2521 21.8611 99.3951 22.6714 99.6786 23.117C99.9622 23.5635 100.388 23.7855 100.956 23.7855C101.566 23.7855 102.178 23.6438 102.788 23.3603C103.028 23.2296 103.28 23.0777 103.541 22.9029L104 23.8163C103.716 24.0564 103.378 24.295 102.986 24.5344C102.07 25.0131 100.99 25.2533 99.7458 25.2541C98.2403 25.2541 97.0721 24.8478 96.2427 24.032L96.2419 24.0344Z" fill="#3E3566"/>
				<path d="M2.68248 25.7328C2.68248 24.6233 2.52845 23.8029 2.22278 23.2698C1.91631 22.7367 1.30574 22.4706 0.3895 22.4714H0.0617065V21.4926L8.96506 21.4879C13.3725 21.4855 16.7286 22.4139 19.0319 24.2729C21.3351 26.132 22.4875 28.747 22.4891 32.1186C22.4899 34.2722 22.0049 36.1706 21.035 37.8132C20.0642 39.4565 18.6251 40.7352 16.716 41.6494C14.8069 42.5644 12.5108 43.0219 9.82601 43.0234L2.69038 43.0274L2.6809 25.7328H2.68248ZM9.72886 41.7187C11.2565 41.7179 12.6142 41.3368 13.8038 40.5746C14.9925 39.8132 15.919 38.714 16.5841 37.2777C17.2484 35.8415 17.5809 34.1667 17.5793 32.2517C17.5785 30.3588 17.2444 28.7005 16.5786 27.2761C15.9119 25.8517 14.9783 24.7477 13.7777 23.9651C12.5771 23.1824 11.202 22.7918 9.65224 22.7926H9.39079C8.67044 22.7926 8.09226 22.8375 7.65625 22.9241L6.9359 23.0225L6.94537 41.4919L7.66573 41.6226C8.12385 41.688 8.70203 41.7203 9.40027 41.7195H9.72728L9.72886 41.7187Z" fill="#3E3566"/>
				<path d="M36.2457 28.9307C36.4203 29.2677 36.5079 29.4472 36.5079 29.4685L34.839 30.7417C34.6857 30.5464 34.489 30.3393 34.2497 30.122C33.7695 29.6874 33.2126 29.47 32.5799 29.47C31.3138 29.47 30.3431 29.8086 29.6669 30.4834L29.7325 30.9724C29.7759 31.3645 29.798 31.7228 29.7988 32.0496L29.8044 43.0134L25.5494 43.0158L25.5438 31.9212C25.5438 30.8118 25.3953 29.9913 25.1007 29.4582C24.8061 28.9259 24.2003 28.659 23.2832 28.6598H22.9562V27.681L26.1971 27.6795C26.9387 27.6795 27.5232 27.7716 27.9482 27.9559C28.3739 28.1409 28.7065 28.4503 28.9474 28.8858C30.125 27.8629 31.4994 27.3503 33.0712 27.3495C34.0088 27.3495 34.7845 27.5669 35.3958 28.0007C35.7884 28.2834 36.0719 28.5937 36.2473 28.9307H36.2457Z" fill="#3E3566"/>
				<path d="M39.4598 42.2912C38.3248 41.596 37.4456 40.644 36.8232 39.4377C36.2008 38.2306 35.8888 36.866 35.888 35.3432C35.8872 33.6463 36.1977 32.1998 36.8185 31.003C37.4401 29.8061 38.2955 28.8975 39.3863 28.277C40.4771 27.6565 41.7101 27.3455 43.0845 27.3447C44.4375 27.3447 45.6594 27.6156 46.751 28.1589C47.8426 28.7022 48.7044 29.4691 49.3386 30.4581C49.9721 31.4479 50.2888 32.5841 50.2896 33.8676C50.2896 34.281 50.2683 34.7487 50.2249 35.2707L50.1601 35.9235L40.3073 35.929C40.3081 37.9959 40.6248 39.5022 41.2591 40.4479C41.8926 41.3936 42.7764 41.8668 43.9115 41.866C44.9588 41.866 45.8372 41.6314 46.5465 41.1629C47.255 40.6952 47.9374 40.0259 48.5914 39.155L49.6064 39.9046C48.9737 40.8841 48.1831 41.7007 47.2344 42.3534C46.2858 43.007 45.0141 43.3338 43.4218 43.3345C41.9163 43.3345 40.5956 42.9881 39.4606 42.292L39.4598 42.2912ZM45.8711 34.4565C45.8703 32.4117 45.6286 30.9605 45.1492 30.1006C44.6682 29.2416 43.981 28.8124 43.0861 28.8124C42.2567 28.8124 41.5853 29.2534 41.0735 30.1353C40.5609 31.0164 40.3057 32.4581 40.3065 34.4589L45.8711 34.4558V34.4565Z" fill="#3E3566"/>
				<path d="M52.1114 42.1378C51.1399 41.3441 50.6541 40.2732 50.6534 38.9244C50.6534 37.837 50.9085 36.9338 51.4211 36.2157C51.9329 35.4976 52.8334 34.9535 54.1209 34.5826C55.4083 34.2117 57.1974 34.0259 59.4888 34.0251H59.9801C59.9793 32.1322 59.7163 30.7889 59.1926 29.9952C58.6689 29.2015 57.8932 28.8046 56.868 28.8054C56.0165 28.8054 55.3183 29.0133 54.7733 29.4267C54.2275 29.8409 53.8357 30.6133 53.5964 31.744H51.7963C51.7963 31.0054 51.8445 30.3739 51.9424 29.8519C52.0404 29.3298 52.2639 28.8723 52.613 28.481C53.2891 27.7196 54.9249 27.3377 57.5228 27.3361C59.7052 27.3353 61.3694 27.9054 62.5155 29.0464C63.6616 30.1881 64.2359 31.9007 64.2367 34.185L64.2414 42.9953L61.4587 42.9968L60.3126 41.5291H60.1491C59.9532 41.8338 59.6475 42.1386 59.2329 42.4433C58.4912 43.0315 57.4873 43.3252 56.2219 43.326C54.4542 43.3267 53.0846 42.9307 52.113 42.137L52.1114 42.1378ZM58.3798 41.4165C58.7068 41.2315 59.0228 40.9756 59.3284 40.6488C59.612 40.3441 59.83 39.985 59.9824 39.5716L59.9801 35.4929H59.4888C57.9391 35.4936 56.8159 35.7716 56.1176 36.3267C55.4194 36.8818 55.0711 37.7472 55.0711 38.9212C55.0711 39.8133 55.2575 40.4984 55.6287 40.9763C55.9999 41.4543 56.5236 41.6937 57.2005 41.6937C57.6587 41.6937 58.0512 41.6008 58.379 41.4157L58.3798 41.4165Z" fill="#3E3566"/>
				<path d="M66.9175 31.8998C66.9175 30.7904 66.769 29.9699 66.4744 29.4368C66.1798 28.9045 65.5739 28.6376 64.6569 28.6384H64.3299V27.6597L67.5707 27.6581C68.9893 27.6581 69.9166 28.0707 70.3534 28.8967H70.4845C71.6835 27.8518 73.0587 27.3289 74.6084 27.3282C75.6771 27.3282 76.6099 27.5282 77.4077 27.9305C78.2039 28.3329 78.7773 28.751 79.1272 29.1864C79.6509 28.6211 80.2725 28.1691 80.9921 27.8313C81.7117 27.4943 82.639 27.325 83.774 27.3242C87.5922 27.3219 89.5037 29.3234 89.5052 33.3258L89.51 42.9849L85.2542 42.9873L85.2495 33.2959C85.2495 31.7951 85.0078 30.6967 84.5275 30.0006C84.0473 29.3053 83.4138 28.9573 82.6287 28.9573C82.0394 28.9573 81.4937 29.0723 80.9921 29.3006C80.4897 29.529 80.0972 29.829 79.8144 30.1983C79.8578 30.2857 79.9455 30.5242 80.0766 30.9164C80.2512 31.5691 80.3389 32.3739 80.3397 33.3305L80.3444 42.9897L76.0886 42.992L76.0839 33.3006C76.0839 31.7998 75.8422 30.7014 75.3619 30.0053C74.8809 29.3101 74.2482 28.962 73.4631 28.962C73.005 28.962 72.5303 29.0982 72.0398 29.3707C71.5485 29.6431 71.1835 29.9423 70.9434 30.2683L71.0422 30.725C71.129 30.9864 71.1733 31.4101 71.1733 31.9975L71.1788 42.9944L66.9238 42.9967L66.9183 31.9022L66.9175 31.8998Z" fill="#3E3566"/>
				<path d="M91.9305 41.9699C91.5814 41.6439 91.3626 41.1817 91.2749 40.5833C91.1873 39.9849 91.143 39.1534 91.143 38.0872H92.2883C92.485 39.2179 92.9329 40.1258 93.6319 40.8109C94.3301 41.4959 95.3017 41.8376 96.5457 41.8368C98.7273 41.8361 99.8189 41.0959 99.8181 39.6164C99.8181 39.051 99.5827 38.5833 99.1136 38.2132C98.6436 37.8439 97.8964 37.4305 96.8703 36.9746L95.1682 36.2573C93.7709 35.6494 92.7235 34.9856 92.0245 34.2683C91.3255 33.551 90.9764 32.6809 90.9756 31.6581C90.9756 30.288 91.5474 29.2218 92.692 28.4596C93.8373 27.6974 95.3372 27.3163 97.1926 27.3147C99.7454 27.3132 101.502 27.7588 102.463 28.6502C102.812 28.9762 103.031 29.4329 103.119 30.0203C103.206 30.6077 103.251 31.4455 103.251 32.5329H102.106C101.909 31.4029 101.46 30.4943 100.762 29.8092C100.063 29.1242 99.0922 28.7825 97.8482 28.7832C96.9098 28.7832 96.2116 28.9856 95.7535 29.388C95.2954 29.7911 95.0663 30.3297 95.0671 31.0037C95.0671 31.5478 95.2582 31.999 95.6405 32.3573C96.022 32.7155 96.6065 33.0691 97.3924 33.4171L99.3568 34.2321C100.972 34.9053 102.134 35.5848 102.844 36.2699C103.553 36.9549 103.909 37.8518 103.91 38.9612C103.91 40.3534 103.294 41.425 102.062 42.1762C100.829 42.9274 99.2091 43.3038 97.2021 43.3046C94.6485 43.3061 92.8918 42.8613 91.9313 41.9691L91.9305 41.9699Z" fill="#3E3566"/>
				<path d="M3.82603 9.87855C4.17278 14.3069 7.79194 17.8424 12.2436 18.1038C12.4261 18.1132 12.6093 18.1195 12.791 18.1195C15.7206 18.118 18.4362 16.7227 20.1351 14.3164C20.2939 14.0943 20.29 13.8085 20.128 13.5896C19.9653 13.3723 19.6944 13.2872 19.4377 13.3715C18.497 13.6817 17.5136 13.8211 16.5128 13.7864C12.1567 13.6345 8.61498 10.1132 8.45147 5.77066C8.40487 4.5368 8.62209 3.34073 9.09758 2.21631C9.20264 1.96907 9.13866 1.69348 8.93408 1.51631C8.83061 1.42576 8.70818 1.37536 8.58259 1.36355C8.45542 1.35174 8.32589 1.38088 8.20899 1.44938C5.23673 3.20608 3.55747 6.43523 3.82682 9.87855H3.82603ZM12.1702 16.214C12.1702 16.0439 12.3092 15.9054 12.4798 15.9046C12.6504 15.9046 12.7894 16.0432 12.7902 16.2132V16.8313C12.7902 17.0014 12.652 17.14 12.4806 17.1408C12.31 17.1408 12.1709 17.0022 12.1702 16.8321V16.214ZM10.4554 16.5274L10.6149 15.9298C10.6489 15.8061 10.7523 15.7203 10.8716 15.703C10.9119 15.6967 10.9538 15.6998 10.9964 15.7117C11.1607 15.755 11.2594 15.925 11.216 16.0896L11.0549 16.6872C11.0177 16.825 10.8929 16.9164 10.7555 16.9172C10.7287 16.9172 10.7018 16.9132 10.6742 16.9061C10.5099 16.8621 10.4111 16.6928 10.4546 16.5282L10.4554 16.5274ZM8.87958 15.7896L9.18921 15.2542C9.25319 15.1431 9.37562 15.0865 9.49568 15.1014C9.53596 15.1061 9.57466 15.1195 9.61179 15.14C9.76028 15.225 9.81004 15.4148 9.72474 15.5636L9.41511 16.0991C9.35824 16.1983 9.25398 16.2534 9.14734 16.2534C9.09363 16.2534 9.04071 16.24 8.99253 16.2109C8.84404 16.1266 8.79428 15.9369 8.87958 15.7896ZM5.75883 7.37382C5.67747 7.59587 5.60875 7.82343 5.55188 8.05177C5.51713 8.19193 5.38996 8.28642 5.25094 8.28642C5.22725 8.28642 5.20118 8.28406 5.1767 8.27776C5.01083 8.23681 4.90893 8.0691 4.95001 7.90374C5.01161 7.65413 5.08744 7.40374 5.17591 7.16122C5.22093 7.04153 5.3323 6.96437 5.45236 6.95807C5.49343 6.95649 5.53372 6.96279 5.574 6.97696C5.73513 7.03445 5.81886 7.2124 5.75962 7.37303L5.75883 7.37382ZM4.75254 9.2943C4.75965 9.12422 4.89866 8.99351 5.07559 8.99981C5.2462 9.0069 5.37811 9.15099 5.371 9.32186C5.32203 10.5069 5.59769 11.6809 6.16719 12.7179C6.25012 12.8675 6.19404 13.0557 6.04397 13.1368C5.99658 13.1636 5.94602 13.1754 5.89626 13.1754C5.78647 13.1754 5.67984 13.1179 5.62376 13.0148C4.99977 11.8794 4.69883 10.5927 4.75254 9.2943Z" fill="#3E3566"/>
				<path d="M15.0291 2.28072L15.7462 2.71222C15.8592 2.77993 15.999 2.67915 15.969 2.5508L15.7778 1.73741L16.4113 1.18938C16.5108 1.10276 16.4579 0.939768 16.326 0.928745L15.4919 0.858666L15.1649 0.0909453C15.1136 -0.0303151 14.9414 -0.0303151 14.89 0.0909453L14.5638 0.858666L13.7297 0.929532C13.5978 0.940556 13.5449 1.10434 13.6444 1.19016L14.2787 1.73741L14.0891 2.5508C14.0591 2.67915 14.1989 2.77993 14.3119 2.71222L15.0291 2.27993V2.28072Z" fill="#3E3566"/>
				<path d="M11.3578 8.46114L11.7495 8.69657C11.8112 8.73358 11.8878 8.67846 11.8712 8.60838L11.7669 8.16428L12.1129 7.86586C12.1674 7.81861 12.1382 7.72964 12.0663 7.72334L11.6113 7.68475L11.4328 7.26585C11.4044 7.19971 11.3112 7.19971 11.2827 7.26585L11.105 7.68475L10.6501 7.72334C10.5782 7.72964 10.549 7.81861 10.6035 7.86586L10.9494 8.16428L10.8459 8.60838C10.8294 8.67846 10.906 8.73358 10.9676 8.69657L11.3586 8.46114H11.3578Z" fill="#3E3566"/>
				<path d="M1.43628 6.68331L2.15347 7.11481C2.26642 7.18252 2.40623 7.08173 2.37622 6.95339L2.18507 6.14L2.81854 5.59196C2.91806 5.50535 2.86514 5.34236 2.73323 5.33133L1.89914 5.26125L1.57213 4.49353C1.52079 4.37227 1.3486 4.37227 1.29726 4.49353L0.971047 5.26125L0.13695 5.33212C0.00504287 5.34314 -0.047878 5.50692 0.0516449 5.59275L0.685906 6.14L0.496339 6.95339C0.466324 7.08173 0.60613 7.18252 0.71908 7.11481L1.43628 6.68252V6.68331Z" fill="#3E3566"/>
			</svg>
		</div>
		<button class="purple-btn header-btn tilt-el pulse-anim claim-btn">
			<div class="border border-1"></div>
			<div class="border border-2"></div>
			<span><?php echo $data->header_button_text[0]->text ?></span>
		</button>
	</nav>
</header>

<?php if (isset($data->hero_heading[0]->text) && $data->hero_heading[0]->text != "") { ?>
	<section class="hero c-224 mw">
		<img class="preload-critical bg" data-preload-desktop="<?php echo prismicReturnImage($data->hero_background_image1->url, "1680", "85"); ?>" data-preload-mobile="<?php echo prismicReturnImage($data->hero_background_image_mobile->url, "500", "85"); ?>">
		<div class="inner">
			<div class="left mw">
				<div class="fieldwork-reg"><?php echo RichText::asHtml($data->hero_heading); ?></div>
				<div class="list-hero">
					<?php foreach ($data->hero_list as $item) { ?>
						<div class="list-item fieldwork-reg">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M12 24C13.6414 24 15.1869 23.6853 16.6367 23.056C18.0863 22.4346 19.3596 21.5712 20.4564 20.4662C21.5609 19.3611 22.4276 18.0873 23.0565 16.6446C23.6854 15.1943 24 13.6441 24 11.9942C24 10.352 23.6854 8.80959 23.0565 7.36691C22.4276 5.91654 21.5609 4.63885 20.4564 3.53382C19.3596 2.42877 18.0825 1.56546 16.6251 0.94389C15.1755 0.314628 13.6299 0 11.9885 0C10.3471 0 8.80153 0.314628 7.35187 0.94389C5.9022 1.56546 4.62511 2.42877 3.52062 3.53382C2.42377 4.63885 1.56089 5.91654 0.931928 7.36691C0.310643 8.80959 0 10.352 0 11.9942C0 13.6441 0.310643 15.1943 0.931928 16.6446C1.56089 18.0873 2.42761 19.3611 3.53212 20.4662C4.63662 21.5712 5.9137 22.4346 7.36338 23.056C8.81304 23.6853 10.3586 24 12 24ZM10.7229 17.7036C10.4851 17.7036 10.2704 17.6536 10.0786 17.5539C9.88686 17.4465 9.70662 17.2854 9.53787 17.0704L6.7651 13.7324C6.65772 13.5866 6.57335 13.4446 6.51198 13.3065C6.45829 13.1607 6.43145 13.011 6.43145 12.8575C6.43145 12.5352 6.54267 12.2628 6.7651 12.0403C6.98754 11.8101 7.25983 11.695 7.58197 11.695C7.77373 11.695 7.94631 11.7372 8.09971 11.8216C8.25312 11.8983 8.40653 12.0326 8.55993 12.2245L10.6884 14.895L15.325 7.48201C15.6012 7.0446 15.9424 6.8259 16.3489 6.8259C16.6558 6.8259 16.9281 6.92567 17.1658 7.12518C17.4113 7.3247 17.5341 7.58561 17.5341 7.90791C17.5341 8.05371 17.5034 8.19952 17.442 8.34533C17.3883 8.49113 17.3193 8.62926 17.2348 8.75972L11.8619 17.0704C11.7239 17.2699 11.5551 17.4273 11.3557 17.5425C11.1639 17.6499 10.953 17.7036 10.7229 17.7036Z" fill="#DAD0FF"/>
							</svg>
							<p><?php echo $item->list_item[0]->text ?></p>
						</div>
					<?php } ?>
				</div>
				<div class="btn-clause-wrapper">
					<button class="purple-btn pulse-anim tilt-el claim-btn">
						<div class="border border-1"></div>
						<div class="border border-2"></div>
						<span><?php echo $data->hero_button_text[0]->text ?></span>
					</button>
					<div class="clause">
						<svg width="6" height="7" viewBox="0 0 6 7" fill="none" xmlns="http://www.w3.org/2000/svg">
							<circle cx="3" cy="3.5" r="3" fill="#0CFF33"/>
						</svg>
						<p class="fieldwork-demi"><?php echo $data->hero_clause[0]->text ?></p>
					</div>
				</div>
				<div class="hero-review">
					<p class="fieldwork-bold"><?php echo $data->hero_review_copy[0]->text ?></p>
					<div class="review-stars">
						<img class="preload" data-preload-desktop="<?php echo $data->hero_review_stars1->url ?>" data-preload-mobile="<?php echo $data->hero_review_stars1->url ?>">
						<p class="fieldwork-demi"><?php echo $data->hero_review_stars[0]->text ?></p>
					</div>
					<p class="author fieldwork-demi">
						<?php echo $data->hero_review_author[0]->text ?>
						<span class="fieldwork-light">
						<svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M7 14.0049C7.9575 14.0049 8.85903 13.8213 9.70471 13.4542C10.5503 13.0917 11.2931 12.5881 11.9329 11.9435C12.5772 11.2989 13.0827 10.5558 13.4496 9.71423C13.8165 8.8682 14 7.96395 14 7.00152C14 6.04357 13.8165 5.14381 13.4496 4.30224C13.0827 3.4562 12.5772 2.71088 11.9329 2.06628C11.2931 1.42167 10.5481 0.918068 9.69798 0.555485C8.85238 0.188416 7.95078 0.00488281 6.99329 0.00488281C6.03579 0.00488281 5.13423 0.188416 4.28859 0.555485C3.44295 0.918068 2.69798 1.42167 2.05369 2.06628C1.41387 2.71088 0.910516 3.4562 0.543624 4.30224C0.181208 5.14381 0 6.04357 0 7.00152C0 7.96395 0.181208 8.8682 0.543624 9.71423C0.910516 10.5558 1.41611 11.2989 2.06041 11.9435C2.70469 12.5881 3.44966 13.0917 4.2953 13.4542C5.14094 13.8213 6.0425 14.0049 7 14.0049ZM6.25503 10.332C6.11633 10.332 5.99106 10.3028 5.8792 10.2447C5.76733 10.182 5.6622 10.088 5.56376 9.96264L3.94631 8.01544C3.88367 7.93038 3.83445 7.84757 3.79866 7.76699C3.76734 7.68194 3.75168 7.59465 3.75168 7.50512C3.75168 7.31711 3.81656 7.1582 3.94631 7.02839C4.07607 6.89409 4.2349 6.82694 4.42282 6.82694C4.53468 6.82694 4.63535 6.85157 4.72483 6.9008C4.81432 6.94557 4.90381 7.02391 4.99329 7.13582L6.2349 8.69363L8.93961 4.36939C9.1007 4.11423 9.29976 3.98666 9.53689 3.98666C9.71591 3.98666 9.87473 4.04485 10.0134 4.16124C10.1566 4.27762 10.2282 4.42982 10.2282 4.61783C10.2282 4.70288 10.2103 4.78794 10.1745 4.87299C10.1432 4.95804 10.1029 5.03862 10.0537 5.11472L6.91947 9.96264C6.83893 10.079 6.74049 10.1708 6.62416 10.238C6.5123 10.3007 6.38926 10.332 6.25503 10.332Z" fill="#3897F0"/>
						</svg>
						Verified Buyer
					</span>
					</p>
				</div>
			</div>
			<div class="right mw">
				<!--			<img class="preload-critical" data-preload-desktop="--><?php //echo prismicReturnImage($data->hero_product_image->url, "500", "85"); ?><!--" data-preload-mobile="--><?php //echo prismicReturnImage($data->hero_product_image_mobile->url, "400", "85") ?><!--">-->
				<img class="preload-critical" data-preload-desktop="<?php echo prismicReturnImage($data->hero_product_image->url, "780", "90"); ?>" data-preload-mobile="<?php echo prismicReturnImage($data->hero_product_image->url, "500", "90"); ?>">
			</div>
		</div>
	</section>
<?php } ?>

<?php if (isset($data->assets_list_heading[0]->text) && $data->assets_list_heading[0]->text != "") { ?>
	<section class="assets-list c-224">
		<div class="fieldwork-demi"><?php echo RichText::asHtml($data->assets_list_heading); ?></div>
		<div class="inner mw">
			<?php foreach ($data->assets_list as $item) { ?>
				<div class="block">
					<div class="img-wrapper">
						<img class="preload" data-preload-desktop="<?php echo prismicReturnImage($item->icon->url, "350", "90"); ?>" data-preload-mobile="<?php echo prismicReturnImage($item->icon->url, "275", "90"); ?>">
					</div>
					<p class="fieldwork-demi"><?php echo $item->text[0]->text ?></p>
				</div>
			<?php } ?>
		</div>
	</section>
<?php } ?>

<?php if (isset($data->benefits_cta_heading[0]->text) && $data->benefits_cta_heading[0]->text != "") { ?>
	<section class="benefits-cta c-224">
		<div class="left">
			<div class="fieldwork-demi"><?php echo RichText::asHtml($data->benefits_cta_heading); ?></div>
			<div class="copy fieldwork-reg"><?php echo RichText::asHtml($data->benefits_cta_copy); ?></div>
			<div class="inner mw">
				<?php foreach ($data->benefits_cta_repeater as $item) { ?>
					<div class="block">
						<img class="preload" data-preload-desktop="<?php echo $item->icon->url ?>" data-preload-mobile="<?php echo $item->icon->url ?>">
						<div class="block-right">
							<p class="block-title fieldwork-demi"><?php echo $item->title[0]->text ?></p>
							<p class="block-copy fieldwork-demi"><?php echo $item->copy[0]->text ?></p>
						</div>
					</div>
				<?php } ?>
			</div>
			<div class="btn-clause-wrapper">
				<button class="purple-btn pulse-anim tilt-el claim-btn">
					<div class="border border-1"></div>
					<div class="border border-2"></div>
					<span><?php echo $data->benefits_cta_button_text[0]->text ?></span>
				</button>
				<div class="clause">
					<svg width="6" height="7" viewBox="0 0 6 7" fill="none" xmlns="http://www.w3.org/2000/svg">
						<circle cx="3" cy="3.5" r="3" fill="#0CFF33"/>
					</svg>
					<p class="fieldwork-demi"><?php echo $data->benefits_cta_clause[0]->text ?></p>
				</div>
			</div>
		</div>
		<div class="right mw">
			<img class="preload bg" data-preload-desktop="<?php echo prismicReturnImage($data->benefits_cta_image->url, "921", "90"); ?>" data-preload-mobile="<?php echo prismicReturnImage($data->benefits_cta_image->url, "921", "90"); ?>">
		</div>
	</section>
<?php } ?>

<?php if (isset($data->subscriptions_heading[0]->text) && $data->subscriptions_heading[0]->text != "") { ?>
	<section class="subscription-section c-224 section-btn">
		<div class="bg-wrapper mw">
			<img class="preload bg mw" data-preload-desktop="<?php echo $data->subscription_background_image->url ?>" data-preload-mobile="<?php echo $data->subscription_background_image->url ?>">
		</div>
		<div class="fieldwork-demi">
			<?php echo RichText::asHtml($data->subscriptions_heading); ?>
		</div>
		<div class="fieldwork-reg">
			<?php echo RichText::asHtml($data->subscription_text); ?>
		</div>
		<div class="inner mw">
			<?php foreach ($data->subscription_repeater as $item) { ?>
				<div class="block slide <?php if ($item->top_bar_color_purple === true) { ?><?php echo 'purple'?><?php } else if ($item->top_bar_color_white === true) { ?><?php echo 'white'?><?php } ?>">
					<div class="top mw">
						<?php if (isset($item->top_bar_text[0])) { ?>
							<div class="top-bar fieldwork-demi"><?php echo $item->top_bar_text[0]->text ?></div>
						<?php } ?>
						<img class="preload bg" data-preload-desktop="<?php echo $item->background_image->url ?>" data-preload-mobile="<?php echo $item->background_image->url ?>">
						<img class="preload bg" data-preload-desktop="<?php echo prismicReturnImage($item->image->url, "480", "90"); ?>" data-preload-mobile="<?php echo prismicReturnImage($item->image->url, "480", "90"); ?>">
					</div>
					<div class="bottom">
						<p class="copy fieldwork-demi"><?php echo $item->title[0]->text ?></p>
						<div class="price-wrapper">
							<div class="prices fieldwork-demi">
								<?php if (isset($item->old_price[0])) { ?>
									<p class="price old"><?php echo $item->old_price[0]->text ?></p>
								<?php } ?>
								<p class="price <?php if (isset($item->old_price[0])) { ?><?php echo 'new'?><?php } ?>">
									<?php echo $item->price[0]->text ?>
								</p>
							</div>
							<p class="price per-night fieldwork-reg">| <?php echo $item->per_night_price[0]->text ?> Per Night</p>
						</div>
						<div class="list fieldwork-reg">
							<?php echo RichText::asHtml($item->list); ?>
						</div>
						<?php if (isset($item->savings_percentage[0])) { ?>
							<p class="discount fieldwork-demi">
								You save: <span class="fieldwork-bold"><?php echo $item->savings_percentage[0]->text ?></span>
							</p>
						<?php } ?>
						<div class="btn-clause-wrapper">
							<a class="purple-btn clean tilt-el" href="<?php echo $item->button_link[0]->text ?>" target="_blank">
								<span><?php echo $item->button_text[0]->text ?></span>
							</a>
							<div class="clause">
								<svg width="6" height="7" viewBox="0 0 6 7" fill="none" xmlns="http://www.w3.org/2000/svg">
									<circle cx="3" cy="3.5" r="3" fill="#0CFF33"/>
								</svg>
								<p class="fieldwork-demi"><?php echo $item->clause[0]->text ?></p>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</section>
<?php } ?>

<?php if (isset($data->variant_heading[0]->text) && $data->variant_heading[0]->text != "") { ?>
<section class="c-224 variants section-btn">
		<div class="left mw">
			<?php foreach ($data->options as $key => $option) { ?>
					<img class="preload bg option-image" data-preload-desktop="<?php echo prismicReturnImage($option->image_1->url, "900", "100"); ?>" data-preload-mobile="<?php echo prismicReturnImage($option->image_1->url, "805", "100"); ?>">
			<?php } ?>
		</div>
		<div class="right mw">
			<div class="fieldwork-demi">
				<?php echo RichText::asHtml($data->variant_heading); ?>
			</div>
			<div class="reviews">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 93 19"><path fill="#FFC700" d="M8.527 1.464a.5.5 0 0 1 .95 0l1.434 4.411a.5.5 0 0 0 .476.345h4.638a.5.5 0 0 1 .294.905l-3.752 2.726a.5.5 0 0 0-.182.56l1.433 4.41a.5.5 0 0 1-.77.56l-3.752-2.726a.5.5 0 0 0-.588 0L4.956 15.38a.5.5 0 0 1-.77-.56l1.434-4.41a.5.5 0 0 0-.182-.56L1.686 7.125a.5.5 0 0 1 .293-.905h4.639a.5.5 0 0 0 .475-.345l1.434-4.411ZM27.275 1.464a.5.5 0 0 1 .95 0l1.434 4.411a.5.5 0 0 0 .476.345h4.638a.5.5 0 0 1 .294.905l-3.752 2.726a.5.5 0 0 0-.182.56l1.433 4.41a.5.5 0 0 1-.77.56l-3.752-2.726a.5.5 0 0 0-.588 0l-3.752 2.726a.5.5 0 0 1-.77-.56l1.434-4.41a.5.5 0 0 0-.182-.56l-3.752-2.726a.5.5 0 0 1 .293-.905h4.639a.5.5 0 0 0 .476-.345l1.433-4.411ZM46.025 1.464a.5.5 0 0 1 .95 0l1.434 4.411a.5.5 0 0 0 .476.345h4.638a.5.5 0 0 1 .294.905l-3.752 2.726a.5.5 0 0 0-.182.56l1.433 4.41a.5.5 0 0 1-.77.56l-3.752-2.726a.5.5 0 0 0-.587 0l-3.753 2.726a.5.5 0 0 1-.77-.56l1.434-4.41a.5.5 0 0 0-.182-.56l-3.752-2.726a.5.5 0 0 1 .294-.905h4.638a.5.5 0 0 0 .476-.345l1.433-4.411ZM83.523 1.464a.5.5 0 0 1 .951 0l1.433 4.411a.5.5 0 0 0 .476.345h4.638a.5.5 0 0 1 .294.905l-3.752 2.726a.5.5 0 0 0-.182.56l1.433 4.41a.5.5 0 0 1-.769.56l-3.753-2.726a.5.5 0 0 0-.587 0l-3.753 2.726a.5.5 0 0 1-.77-.56l1.434-4.41a.5.5 0 0 0-.182-.56l-3.752-2.726a.5.5 0 0 1 .293-.905h4.639a.5.5 0 0 0 .476-.345l1.433-4.411ZM64.773 1.464a.5.5 0 0 1 .951 0l1.433 4.411a.5.5 0 0 0 .476.345h4.638a.5.5 0 0 1 .294.905l-3.752 2.726a.5.5 0 0 0-.182.56l1.433 4.41a.5.5 0 0 1-.769.56l-3.753-2.726a.5.5 0 0 0-.587 0l-3.753 2.726a.5.5 0 0 1-.77-.56l1.434-4.41a.5.5 0 0 0-.182-.56l-3.752-2.726a.5.5 0 0 1 .293-.905h4.639a.5.5 0 0 0 .476-.345l1.433-4.411Z" /></svg>
				<p class="fieldwork-demi"><?php echo $data->variant_reviews[0]->text ?></p>
			</div>
			<div class="eyebrow fieldwork-light"><?php echo $data->variant_eyebrow[0]->text ?></div>
			<div class="description fieldwork-light">
				<p><?php echo RichText::asHtml($data->variant_text); ?></p>
			</div>
			<div class="option-name fieldwork-reg">
				<p><?php echo $data->options[0]->flavor[0]->text ?></p>
			</div>
			<div class="option-description fieldwork-light">
				<p><?php echo $data->options[0]->text[0]->text ?></p>
			</div>
			<div class="option-triggers">
				<?php foreach ($data->options as $key => $option) { ?>
					<button class="option-trigger<?php if ($key === 0) { ?> active<?php } ?>" style="background: <?php echo $option->image_2_background_color[0]->text ?>" data-link="<?php echo $option->url[0]->text ?>" data-flavor="<?php echo $option->flavor[0]->text ?>" data-descript="<?php echo $option->text[0]->text ?>">
						<img class="preload" data-preload-desktop="<?php echo $option->image_2->url ?>" data-preload-mobile="<?php echo $option->image_2->url ?>">
					</button>
				<?php } ?>
			</div>
			<div class="btn-clause-wrapper">
				<a class="purple-btn pulse-anim tilt-el" href="<?php echo $data->options[0]->url[0]->text ?>" target="_blank">
					<div class="border border-1"></div>
					<div class="border border-2"></div>
					<span>CLAIM FREE GUMMIES</span>
				</a>
				<div class="clause">
					<svg width="6" height="7" viewBox="0 0 6 7" fill="none" xmlns="http://www.w3.org/2000/svg">
						<circle cx="3" cy="3.5" r="3" fill="#0CFF33"/>
					</svg>
					<p class="fieldwork-demi">30 day, 100% money back guarantee</p>
				</div>
			</div>
		</div>
</section>
<?php } ?>

<?php if (isset($data->trio_heading[0]->text) && $data->trio_heading[0]->text != "") { ?>
	<section class="trial-trio c-273">
			<div class="fieldwork-demi">
				<?php echo RichText::asHtml($data->trio_heading); ?>
			</div>
			<div class="inner mw">
				<?php foreach ($data->trio_repeater as $tile) { ?>
					<div class="tile">
						<span class="fieldwork-reg"><?php echo $tile->step[0]->text ?></span>
						<div class="image-wrapper">
							<img class="preload bg" data-preload-desktop="<?php echo $tile->image->url ?>" data-preload-mobile="<?php echo $tile->image->url ?>">
						</div>
						<div class="text-wrapper">
							<p class="fieldwork-reg"><?php echo $tile->title[0]->text ?></p>
							<p class="fieldwork-light"><?php echo $tile->copy[0]->text ?></p>
						</div>
					</div>
				<?php } ?>
			</div>
	</section>
<?php } ?>

<?php if (isset($data->how_to_section_heading[0]->text) && $data->how_to_section_heading[0]->text != "") { ?>
	<section class="how-to-section c-224">
		<div class="fieldwork-demi"><?php echo RichText::asHtml($data->how_to_section_heading); ?></div>
		<div class="inner mw">
			<?php foreach ($data->how_to_repeater as $item) { ?>
				<div class="block">
					<div class="img-wrapper">
						<img class="preload" data-preload-desktop="<?php echo prismicReturnImage($item->icon->url, "350", "90"); ?>" data-preload-mobile="<?php echo prismicReturnImage($item->icon->url, "110", "90"); ?>">
					</div>
					<p class="fieldwork-demi"><?php echo $item->text[0]->text ?></p>
				</div>
			<?php } ?>
		</div>
	</section>
<?php } ?>

<?php if (isset($data->sticky_header[0]->text) && $data->sticky_header[0]->text != "") { ?>
	<section class="claim-sticky mw c-230">
		<div class="left">
			<div class="fieldwork-reg"><?php echo RichText::asHtml($data->sticky_header); ?></div>
			<p class="mobile-text fieldwork-light"><?php echo $data->sticky_mobile_copy[0]->text ?></p>
			<div class="left-group">
				<?php foreach ($data->sticky_left as $group) { ?>
					<div class="group">
						<img class="preload" data-preload-desktop="<?php echo $group->image->url ?>" data-preload-mobile="<?php echo $group->image->url ?>">
						<div class="text-wrapper">
							<p class="fieldwork-demi"><?php echo $group->title[0]->text ?></p>
							<p class="fieldwork-demi"><?php echo $group->copy[0]->text ?></p>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="right slider no-drag-free no-loop" data-align="start" data-at="767">
			<div class="slides">
				<div class="inner">
					<?php foreach ($data->sticky_right as $group) { ?>
						<div class="slide">
							<img class="preload" data-preload-desktop="<?php echo prismicReturnImage($group->image->url, "700", "90"); ?>" data-preload-mobile="<?php echo prismicReturnImage($group->image->url, "500", "90"); ?>">
							<div class="title fieldwork-reg"><?php echo RichText::asHtml($group->title); ?></div>
							<p class="copy fieldwork-light"><?php echo $group->copy[0]->text ?></p>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="dots">
				<?php foreach ($data->sticky_right as $key => $slider) { ?>
					<div class="dot <?php if ($key === 0) { ?>active<?php } ?>"></div>
				<?php } ?>
			</div>
		</div>
	</section>
<?php } ?>

<?php if (isset($data->nutrition_heading[0]->text) && $data->nutrition_heading[0]->text != "") { ?>
	<section class="nutrition-claim mw c-280">
		<div class="fieldwork-demi"><?php echo RichText::asHtml($data->nutrition_heading); ?></div>
		<p class="copy fieldwork-reg"><?php echo $data->nutrition_copy[0]->text ?></p>
		<div class="inner">
			<?php foreach ($data->nutrition_tile as $tile) { ?>
				<div class="tile">
					<img class="preload" data-preload-desktop="<?php echo prismicReturnImage($tile->image->url, "218", "90"); ?>" data-preload-mobile="<?php echo prismicReturnImage($tile->image->url, "218", "90"); ?>">
					<p class="fieldwork-reg"><?php echo $tile->title[0]->text ?></p>
					<p class="fieldwork-light"><?php echo $tile->copy[0]->text ?></p>
				</div>
			<?php } ?>
		</div>
	</section>
<?php } ?>

<?php if (isset($data->vs_header[0]->text) && $data->vs_header[0]->text != "") { ?>
	<section class="vs-claim mw c-230">
		<div class="fieldwork-demi"><?php echo RichText::asHtml($data->vs_header); ?></div>
		<p class="copy fieldwork-reg"><?php echo $data->vs_copy[0]->text ?></p>
		<div class="left fieldwork-reg">
			<div class="vs-table">
				<div class="vs-left">
					<div class="block"></div>
					<?php foreach ($data->vs_text as $item) { ?>
						<div class="block"><p><?php echo $item->text[0]->text ?></p></div>
					<?php } ?>
				</div>
				<div class="vs-right">
					<div class="col-left">
						<div class="block">
							<img class="preload" data-preload-desktop="<?php echo $data->check_1_image->url ?>" data-preload-mobile="<?php echo $data->check_1_image->url ?>">
							<p><?php echo $data->check_1_title[0]->text ?></p>
						</div>
						<?php foreach ($data->check_1 as $item) { ?>
							<div class="block">
								<?php if($item->check === true): ?>
									<div class="check-wrapper">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 42 42"><path fill="#A1D3A2" d="M20.999.583a20.417 20.417 0 1 0 0 40.834 20.417 20.417 0 0 0 0-40.834Z"/><path fill="#FEFDEF" d="M19.542 27.708c-.28 0-.562-.1-.785-.304l-7-7a1.167 1.167 0 0 1 1.57-1.726l6.2 6.273 10.297-10.342a1.166 1.166 0 1 1 1.602 1.697L20.342 27.389a1.16 1.16 0 0 1-.8.32Z"/><path fill="#1F212B" d="M19.544 28c-.364 0-.713-.135-.982-.38l-7.009-7.01a1.435 1.435 0 0 1-.465-1 1.452 1.452 0 0 1 .377-1.05 1.462 1.462 0 0 1 2.06-.097l6.004 6.074 10.09-10.133c.291-.274.67-.406 1.05-.404.39.01.751.173 1.019.457.268.282.409.653.398 1.042a1.45 1.45 0 0 1-.457 1.02L20.552 27.596a1.458 1.458 0 0 1-1.008.404Zm-6.995-9.334a.881.881 0 0 0-.652.287.87.87 0 0 0-.227.63.868.868 0 0 0 .285.606l7.01 7.01c.307.278.858.282 1.18-.02L31.222 16.1a.873.873 0 0 0 .042-1.242.87.87 0 0 0-.612-.274.854.854 0 0 0-.625.238L19.736 25.157a.293.293 0 0 1-.414 0l-6.2-6.273a.85.85 0 0 0-.573-.218Z"/><path fill="#1F212B" d="M21 42C9.42 42 0 32.58 0 21S9.42 0 21 0s21 9.42 21 21-9.42 21-21 21Zm0-40.834C10.064 1.166 1.167 10.063 1.167 21c0 10.936 8.897 19.834 19.833 19.834 10.937 0 19.834-8.898 19.834-19.834 0-10.937-8.897-19.834-19.834-19.834Z"/><path fill="#1F212B" d="M30.04 5.965a.287.287 0 0 1-.148-.04c-.372-.22-.758-.43-1.148-.622a.292.292 0 0 1 .259-.523c.402.199.802.415 1.186.643a.291.291 0 0 1-.148.543Zm1.75 1.18a.293.293 0 0 1-.177-.06c-.187-.144-.379-.283-.573-.42a.291.291 0 1 1 .335-.477c.201.14.398.285.593.434a.292.292 0 0 1-.177.523Z"/><path fill="#1F212B" d="M21 39.084C11.028 39.084 2.916 30.97 2.916 21S11.028 2.916 21 2.916c2.14 0 4.234.37 6.225 1.1a.292.292 0 1 1-.2.548A17.444 17.444 0 0 0 21 3.5C11.35 3.5 3.5 11.35 3.5 21S11.35 38.5 21 38.5 38.5 30.65 38.5 21a17.54 17.54 0 0 0-5.738-12.958.292.292 0 1 1 .392-.432A18.125 18.125 0 0 1 39.084 21c0 9.971-8.113 18.084-18.084 18.084Z"/></svg>
										<p>Yes</p>
									</div>
								<?php else: ?>
									<div class="check-wrapper red">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 42 42"><path fill="#F37E98" d="M20.999.583a20.416 20.416 0 1 0 0 40.832 20.416 20.416 0 0 0 0-40.832Z"/><path fill="#FDFCEF" d="m22.238 21 6.38-6.381a.874.874 0 1 0-1.237-1.238l-6.38 6.382-6.382-6.382a.872.872 0 0 0-1.238 0 .874.874 0 0 0 0 1.237L19.763 21l-6.382 6.381a.874.874 0 1 0 1.238 1.238L21 22.237l6.381 6.381a.872.872 0 0 0 1.238 0 .875.875 0 0 0 0-1.236L22.238 21Z"/><path fill="#1F212B" d="M21 42C9.42 42 0 32.58 0 21S9.42 0 21 0s21 9.42 21 21-9.42 21-21 21Zm0-40.833C10.064 1.167 1.167 10.064 1.167 21c0 10.936 8.897 19.833 19.833 19.833 10.936 0 19.833-8.897 19.833-19.833 0-10.936-8.897-19.833-19.833-19.833Z"/><path fill="#1F212B" d="M30.04 5.966a.288.288 0 0 1-.148-.041c-.372-.22-.758-.429-1.148-.621a.292.292 0 0 1 .259-.524c.402.2.801.415 1.186.643a.292.292 0 0 1-.148.543Zm1.75 1.18a.293.293 0 0 1-.177-.06c-.188-.144-.379-.284-.573-.42a.291.291 0 1 1 .335-.478c.201.14.398.286.593.435a.292.292 0 0 1-.177.523Z"/><path fill="#1F212B" d="M21.001 39.083C11.03 39.083 2.918 30.971 2.918 21c0-9.97 8.112-18.083 18.083-18.083 2.14 0 4.235.37 6.226 1.1a.292.292 0 1 1-.201.548A17.445 17.445 0 0 0 21.001 3.5c-9.65 0-17.5 7.85-17.5 17.5s7.85 17.5 17.5 17.5 17.5-7.85 17.5-17.5a17.54 17.54 0 0 0-5.737-12.957.292.292 0 0 1 .392-.433A18.125 18.125 0 0 1 39.085 21c0 9.971-8.112 18.083-18.084 18.083Z"/><path fill="#1F212B" d="m22.648 21 6.175-6.175c.221-.22.342-.514.342-.825 0-.312-.121-.605-.341-.825a1.159 1.159 0 0 0-.825-.342c-.312 0-.605.122-.825.342l-6.175 6.175-6.175-6.175a1.159 1.159 0 0 0-.825-.342c-.312 0-.605.122-.825.342-.22.22-.342.513-.342.825 0 .311.121.605.342.825L19.349 21l-6.175 6.175c-.22.22-.342.513-.342.825 0 .311.121.605.342.825.22.22.513.342.825.342.311 0 .604-.122.824-.342L21 22.65l6.175 6.175c.22.22.513.342.825.342.311 0 .604-.122.825-.342.22-.22.341-.514.341-.825 0-.312-.121-.605-.341-.825L22.648 21Zm5.763 7.412a.597.597 0 0 1-.825 0L21 21.825l-6.588 6.587a.597.597 0 0 1-.825 0 .579.579 0 0 1 0-.825L20.174 21l-6.588-6.588a.579.579 0 0 1 0-.825c.22-.22.605-.22.825 0L21 20.175l6.587-6.588c.22-.22.605-.22.825 0a.58.58 0 0 1 0 .825L21.823 21l6.588 6.587a.58.58 0 0 1 0 .825Z"/></svg>
										<p>No</p>
									</div>
								<?php endif ?>
							</div>
						<?php } ?>
					</div>
					<div class="col-right">
						<div class="block">
							<img class="preload" data-preload-desktop="<?php echo $data->check_2_image->url ?>" data-preload-mobile="<?php echo $data->check_2_image->url ?>">
							<p><?php echo $data->check_2_title[0]->text ?></p>
						</div>
						<?php foreach ($data->check_2 as $item) { ?>
							<div class="block">
								<?php if($item->check === true): ?>
									<div class="check-wrapper">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 42 42"><path fill="#A1D3A2" d="M20.999.583a20.417 20.417 0 1 0 0 40.834 20.417 20.417 0 0 0 0-40.834Z"/><path fill="#FEFDEF" d="M19.542 27.708c-.28 0-.562-.1-.785-.304l-7-7a1.167 1.167 0 0 1 1.57-1.726l6.2 6.273 10.297-10.342a1.166 1.166 0 1 1 1.602 1.697L20.342 27.389a1.16 1.16 0 0 1-.8.32Z"/><path fill="#1F212B" d="M19.544 28c-.364 0-.713-.135-.982-.38l-7.009-7.01a1.435 1.435 0 0 1-.465-1 1.452 1.452 0 0 1 .377-1.05 1.462 1.462 0 0 1 2.06-.097l6.004 6.074 10.09-10.133c.291-.274.67-.406 1.05-.404.39.01.751.173 1.019.457.268.282.409.653.398 1.042a1.45 1.45 0 0 1-.457 1.02L20.552 27.596a1.458 1.458 0 0 1-1.008.404Zm-6.995-9.334a.881.881 0 0 0-.652.287.87.87 0 0 0-.227.63.868.868 0 0 0 .285.606l7.01 7.01c.307.278.858.282 1.18-.02L31.222 16.1a.873.873 0 0 0 .042-1.242.87.87 0 0 0-.612-.274.854.854 0 0 0-.625.238L19.736 25.157a.293.293 0 0 1-.414 0l-6.2-6.273a.85.85 0 0 0-.573-.218Z"/><path fill="#1F212B" d="M21 42C9.42 42 0 32.58 0 21S9.42 0 21 0s21 9.42 21 21-9.42 21-21 21Zm0-40.834C10.064 1.166 1.167 10.063 1.167 21c0 10.936 8.897 19.834 19.833 19.834 10.937 0 19.834-8.898 19.834-19.834 0-10.937-8.897-19.834-19.834-19.834Z"/><path fill="#1F212B" d="M30.04 5.965a.287.287 0 0 1-.148-.04c-.372-.22-.758-.43-1.148-.622a.292.292 0 0 1 .259-.523c.402.199.802.415 1.186.643a.291.291 0 0 1-.148.543Zm1.75 1.18a.293.293 0 0 1-.177-.06c-.187-.144-.379-.283-.573-.42a.291.291 0 1 1 .335-.477c.201.14.398.285.593.434a.292.292 0 0 1-.177.523Z"/><path fill="#1F212B" d="M21 39.084C11.028 39.084 2.916 30.97 2.916 21S11.028 2.916 21 2.916c2.14 0 4.234.37 6.225 1.1a.292.292 0 1 1-.2.548A17.444 17.444 0 0 0 21 3.5C11.35 3.5 3.5 11.35 3.5 21S11.35 38.5 21 38.5 38.5 30.65 38.5 21a17.54 17.54 0 0 0-5.738-12.958.292.292 0 1 1 .392-.432A18.125 18.125 0 0 1 39.084 21c0 9.971-8.113 18.084-18.084 18.084Z"/></svg>
										<p>Yes</p>
									</div>
								<?php else: ?>
									<div class="check-wrapper red">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 42 42"><path fill="#F37E98" d="M20.999.583a20.416 20.416 0 1 0 0 40.832 20.416 20.416 0 0 0 0-40.832Z"/><path fill="#FDFCEF" d="m22.238 21 6.38-6.381a.874.874 0 1 0-1.237-1.238l-6.38 6.382-6.382-6.382a.872.872 0 0 0-1.238 0 .874.874 0 0 0 0 1.237L19.763 21l-6.382 6.381a.874.874 0 1 0 1.238 1.238L21 22.237l6.381 6.381a.872.872 0 0 0 1.238 0 .875.875 0 0 0 0-1.236L22.238 21Z"/><path fill="#1F212B" d="M21 42C9.42 42 0 32.58 0 21S9.42 0 21 0s21 9.42 21 21-9.42 21-21 21Zm0-40.833C10.064 1.167 1.167 10.064 1.167 21c0 10.936 8.897 19.833 19.833 19.833 10.936 0 19.833-8.897 19.833-19.833 0-10.936-8.897-19.833-19.833-19.833Z"/><path fill="#1F212B" d="M30.04 5.966a.288.288 0 0 1-.148-.041c-.372-.22-.758-.429-1.148-.621a.292.292 0 0 1 .259-.524c.402.2.801.415 1.186.643a.292.292 0 0 1-.148.543Zm1.75 1.18a.293.293 0 0 1-.177-.06c-.188-.144-.379-.284-.573-.42a.291.291 0 1 1 .335-.478c.201.14.398.286.593.435a.292.292 0 0 1-.177.523Z"/><path fill="#1F212B" d="M21.001 39.083C11.03 39.083 2.918 30.971 2.918 21c0-9.97 8.112-18.083 18.083-18.083 2.14 0 4.235.37 6.226 1.1a.292.292 0 1 1-.201.548A17.445 17.445 0 0 0 21.001 3.5c-9.65 0-17.5 7.85-17.5 17.5s7.85 17.5 17.5 17.5 17.5-7.85 17.5-17.5a17.54 17.54 0 0 0-5.737-12.957.292.292 0 0 1 .392-.433A18.125 18.125 0 0 1 39.085 21c0 9.971-8.112 18.083-18.084 18.083Z"/><path fill="#1F212B" d="m22.648 21 6.175-6.175c.221-.22.342-.514.342-.825 0-.312-.121-.605-.341-.825a1.159 1.159 0 0 0-.825-.342c-.312 0-.605.122-.825.342l-6.175 6.175-6.175-6.175a1.159 1.159 0 0 0-.825-.342c-.312 0-.605.122-.825.342-.22.22-.342.513-.342.825 0 .311.121.605.342.825L19.349 21l-6.175 6.175c-.22.22-.342.513-.342.825 0 .311.121.605.342.825.22.22.513.342.825.342.311 0 .604-.122.824-.342L21 22.65l6.175 6.175c.22.22.513.342.825.342.311 0 .604-.122.825-.342.22-.22.341-.514.341-.825 0-.312-.121-.605-.341-.825L22.648 21Zm5.763 7.412a.597.597 0 0 1-.825 0L21 21.825l-6.588 6.587a.597.597 0 0 1-.825 0 .579.579 0 0 1 0-.825L20.174 21l-6.588-6.588a.579.579 0 0 1 0-.825c.22-.22.605-.22.825 0L21 20.175l6.587-6.588c.22-.22.605-.22.825 0a.58.58 0 0 1 0 .825L21.823 21l6.588 6.587a.58.58 0 0 1 0 .825Z"/></svg>
										<p>No</p>
									</div>
								<?php endif ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<button class="purple-btn pulse-anim tilt-el claim-btn">
			<div class="border border-1"></div>
			<div class="border border-2"></div>
			<span><?php echo $data->slider_button_text[0]->text ?></span>
		</button>
	</section>
<?php } ?>

<?php if (isset($data->reviews_header[0]->text) && $data->reviews_header[0]->text != "") { ?>
	<section class="claim-reviews c-130 mw">
		<div class="top">
			<div class="fieldwork-demi header"><?php echo RichText::asHtml($data->reviews_header); ?></div>
			<p class="fieldwork-demi">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 93 19"><path fill="#FFC700" d="M8.527 1.464a.5.5 0 0 1 .95 0l1.434 4.411a.5.5 0 0 0 .476.345h4.638a.5.5 0 0 1 .294.905l-3.752 2.726a.5.5 0 0 0-.182.56l1.433 4.41a.5.5 0 0 1-.77.56l-3.752-2.726a.5.5 0 0 0-.588 0L4.956 15.38a.5.5 0 0 1-.77-.56l1.434-4.41a.5.5 0 0 0-.182-.56L1.686 7.125a.5.5 0 0 1 .293-.905h4.639a.5.5 0 0 0 .475-.345l1.434-4.411ZM27.275 1.464a.5.5 0 0 1 .95 0l1.434 4.411a.5.5 0 0 0 .476.345h4.638a.5.5 0 0 1 .294.905l-3.752 2.726a.5.5 0 0 0-.182.56l1.433 4.41a.5.5 0 0 1-.77.56l-3.752-2.726a.5.5 0 0 0-.588 0l-3.752 2.726a.5.5 0 0 1-.77-.56l1.434-4.41a.5.5 0 0 0-.182-.56l-3.752-2.726a.5.5 0 0 1 .293-.905h4.639a.5.5 0 0 0 .476-.345l1.433-4.411ZM46.025 1.464a.5.5 0 0 1 .95 0l1.434 4.411a.5.5 0 0 0 .476.345h4.638a.5.5 0 0 1 .294.905l-3.752 2.726a.5.5 0 0 0-.182.56l1.433 4.41a.5.5 0 0 1-.77.56l-3.752-2.726a.5.5 0 0 0-.587 0l-3.753 2.726a.5.5 0 0 1-.77-.56l1.434-4.41a.5.5 0 0 0-.182-.56l-3.752-2.726a.5.5 0 0 1 .294-.905h4.638a.5.5 0 0 0 .476-.345l1.433-4.411ZM83.523 1.464a.5.5 0 0 1 .951 0l1.433 4.411a.5.5 0 0 0 .476.345h4.638a.5.5 0 0 1 .294.905l-3.752 2.726a.5.5 0 0 0-.182.56l1.433 4.41a.5.5 0 0 1-.769.56l-3.753-2.726a.5.5 0 0 0-.587 0l-3.753 2.726a.5.5 0 0 1-.77-.56l1.434-4.41a.5.5 0 0 0-.182-.56l-3.752-2.726a.5.5 0 0 1 .293-.905h4.639a.5.5 0 0 0 .476-.345l1.433-4.411ZM64.773 1.464a.5.5 0 0 1 .951 0l1.433 4.411a.5.5 0 0 0 .476.345h4.638a.5.5 0 0 1 .294.905l-3.752 2.726a.5.5 0 0 0-.182.56l1.433 4.41a.5.5 0 0 1-.769.56l-3.753-2.726a.5.5 0 0 0-.587 0l-3.753 2.726a.5.5 0 0 1-.77-.56l1.434-4.41a.5.5 0 0 0-.182-.56l-3.752-2.726a.5.5 0 0 1 .293-.905h4.639a.5.5 0 0 0 .476-.345l1.433-4.411Z" /></svg>
				<?php echo $data->reviews_text[0]->text ?>
			</p>
		</div>
		<div class="slider no-drag-free" data-align="center">
			<div class="slides">
				<div class="inner">
					<?php foreach ($data->review_tile as $tile) { ?>
						<div class="slide">
							<div class="img-wrapper">
								<img class="preload bg" data-preload-desktop="<?php echo prismicReturnImage($tile->image->url, "600", "90"); ?>" data-preload-mobile="<?php echo prismicReturnImage($tile->image->url, "500", "90"); ?>">
							</div>
							<div class="stars-wrapper">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 93 19"><path fill="#FFC700" d="M8.527 1.464a.5.5 0 0 1 .95 0l1.434 4.411a.5.5 0 0 0 .476.345h4.638a.5.5 0 0 1 .294.905l-3.752 2.726a.5.5 0 0 0-.182.56l1.433 4.41a.5.5 0 0 1-.77.56l-3.752-2.726a.5.5 0 0 0-.588 0L4.956 15.38a.5.5 0 0 1-.77-.56l1.434-4.41a.5.5 0 0 0-.182-.56L1.686 7.125a.5.5 0 0 1 .293-.905h4.639a.5.5 0 0 0 .475-.345l1.434-4.411ZM27.275 1.464a.5.5 0 0 1 .95 0l1.434 4.411a.5.5 0 0 0 .476.345h4.638a.5.5 0 0 1 .294.905l-3.752 2.726a.5.5 0 0 0-.182.56l1.433 4.41a.5.5 0 0 1-.77.56l-3.752-2.726a.5.5 0 0 0-.588 0l-3.752 2.726a.5.5 0 0 1-.77-.56l1.434-4.41a.5.5 0 0 0-.182-.56l-3.752-2.726a.5.5 0 0 1 .293-.905h4.639a.5.5 0 0 0 .476-.345l1.433-4.411ZM46.025 1.464a.5.5 0 0 1 .95 0l1.434 4.411a.5.5 0 0 0 .476.345h4.638a.5.5 0 0 1 .294.905l-3.752 2.726a.5.5 0 0 0-.182.56l1.433 4.41a.5.5 0 0 1-.77.56l-3.752-2.726a.5.5 0 0 0-.587 0l-3.753 2.726a.5.5 0 0 1-.77-.56l1.434-4.41a.5.5 0 0 0-.182-.56l-3.752-2.726a.5.5 0 0 1 .294-.905h4.638a.5.5 0 0 0 .476-.345l1.433-4.411ZM83.523 1.464a.5.5 0 0 1 .951 0l1.433 4.411a.5.5 0 0 0 .476.345h4.638a.5.5 0 0 1 .294.905l-3.752 2.726a.5.5 0 0 0-.182.56l1.433 4.41a.5.5 0 0 1-.769.56l-3.753-2.726a.5.5 0 0 0-.587 0l-3.753 2.726a.5.5 0 0 1-.77-.56l1.434-4.41a.5.5 0 0 0-.182-.56l-3.752-2.726a.5.5 0 0 1 .293-.905h4.639a.5.5 0 0 0 .476-.345l1.433-4.411ZM64.773 1.464a.5.5 0 0 1 .951 0l1.433 4.411a.5.5 0 0 0 .476.345h4.638a.5.5 0 0 1 .294.905l-3.752 2.726a.5.5 0 0 0-.182.56l1.433 4.41a.5.5 0 0 1-.769.56l-3.753-2.726a.5.5 0 0 0-.587 0l-3.753 2.726a.5.5 0 0 1-.77-.56l1.434-4.41a.5.5 0 0 0-.182-.56l-3.752-2.726a.5.5 0 0 1 .293-.905h4.639a.5.5 0 0 0 .476-.345l1.433-4.411Z" /></svg>
								<p class="fieldwork-demi"><?php echo $tile->stars_text[0]->text ?></p>
							</div>
							<div class="review">
								<p class="fieldwork-reg"><?php echo $tile->title[0]->text ?></p>
								<p class="fieldwork-light"><?php echo $tile->copy[0]->text ?></p>
							</div>
							<div class="author">
								<p class="fieldwork-demi"><?php echo $tile->author[0]->text ?></p>
								<svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.4991 6.50009L11.836 5.46009C12.0879 4.68171 11.7374 3.83509 11.0089 3.46296L10.0355 2.96571L9.53824 1.99234C9.16612 1.26379 8.31949 0.912795 7.54112 1.16521L6.50057 1.50159L5.46057 1.16467C4.6822 0.912795 3.83557 1.26325 3.46345 1.99179L2.96566 2.96517L1.99228 3.46296C1.26374 3.83509 0.913283 4.68171 1.16516 5.46009L1.50207 6.50009L1.16516 7.54009C0.913283 8.31846 1.26374 9.16509 1.99228 9.53721L2.96566 10.0345L3.46291 11.0078C3.83503 11.7364 4.68166 12.0874 5.46003 11.835L6.50057 11.4986L7.54058 11.8355C8.31895 12.0874 9.16558 11.7369 9.5377 11.0084L10.0349 10.035L11.0083 9.53775C11.7369 9.16563 12.0879 8.319 11.8355 7.54063L11.4991 6.50009ZM5.57595 8.50804L4.33391 7.266C4.12266 7.05475 4.12266 6.71134 4.33391 6.50009C4.54516 6.28884 4.88857 6.28884 5.09982 6.50009L5.95891 7.35917L8.44299 4.87509C8.65424 4.66384 8.99766 4.66384 9.20891 4.87509C9.42016 5.08634 9.42016 5.42975 9.20891 5.641L6.34187 8.50804C6.13062 8.7193 5.7872 8.7193 5.57595 8.50804Z" fill="#9180AB" /></svg>
								<span class="fieldwork-light">Verified Buyer</span>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="arrows">
				<button class="arrow prev">
					<i></i>
					<svg width="28" height="24" viewBox="0 0 28 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M26 13.5C26.8284 13.5 27.5 12.8284 27.5 12C27.5 11.1716 26.8284 10.5 26 10.5V13.5ZM0.939341 10.9393C0.353554 11.5251 0.353554 12.4749 0.939341 13.0607L10.4853 22.6066C11.0711 23.1924 12.0208 23.1924 12.6066 22.6066C13.1924 22.0208 13.1924 21.0711 12.6066 20.4853L4.12132 12L12.6066 3.51472C13.1924 2.92893 13.1924 1.97919 12.6066 1.3934C12.0208 0.807611 11.0711 0.807611 10.4853 1.3934L0.939341 10.9393ZM26 10.5L2 10.5V13.5L26 13.5V10.5Z" fill="white"/>
					</svg>
				</button>
				<button class="arrow next">
					<i></i>
					<svg width="28" height="24" viewBox="0 0 28 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M2 10.5C1.17157 10.5 0.5 11.1716 0.5 12C0.5 12.8284 1.17157 13.5 2 13.5L2 10.5ZM27.0607 13.0607C27.6464 12.4749 27.6464 11.5251 27.0607 10.9393L17.5147 1.3934C16.9289 0.80761 15.9792 0.80761 15.3934 1.3934C14.8076 1.97918 14.8076 2.92893 15.3934 3.51472L23.8787 12L15.3934 20.4853C14.8076 21.0711 14.8076 22.0208 15.3934 22.6066C15.9792 23.1924 16.9289 23.1924 17.5147 22.6066L27.0607 13.0607ZM2 13.5L26 13.5L26 10.5L2 10.5L2 13.5Z" fill="white"/>
					</svg>
				</button>
			</div>
		</div>
		<button class="purple-btn pulse-anim tilt-el claim-btn">
			<div class="border border-1"></div>
			<div class="border border-2"></div>
			<span><?php echo $data->slider_button_text[0]->text ?></span>
		</button>
	</section>
<?php } ?>

<?php if (isset($data->faqs_header[0]->text) && $data->faqs_header[0]->text != "") { ?>
	<section class="claim-faqs mw c-230">
		<div class="left">
			<img class="preload" data-preload-desktop="<?php echo prismicReturnImage($data->faqs_image->url, "800", "90"); ?>" data-preload-mobile="<?php echo prismicReturnImage($data->faqs_image->url, "500", "90"); ?>">
		</div>
		<div class="right">
			<div class="fieldwork-demi"><?php echo $data->faqs_header[0]->text ?></div>
			<div class="flex-column">
				<?php foreach ($data->faqs as $group) { ?>
					<div class="col drawer">
						<div class="label">
							<p class="fieldwork-reg"><?php echo $group->question[0]->text ?></p>
							<span><svg width="20" height="20" viewBox="0 0 20 20" fill="none"xmlns="http://www.w3.org/2000/svg"><path d="M19.375 9.0625L11.8416 8.15838L10.9375 0.625H9.0625L8.15838 8.15838L0.625 9.0625V10.9375L8.15838 11.8416L9.0625 19.375H10.9375L11.8416 11.8416L19.375 10.9375V9.0625Z" fill="#1F212B" /></svg></span>
						</div>
						<div class="drawer-items fieldwork-light">
							<p><?php echo $group->answer[0]->text ?></p>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
<?php } ?>

<?php if (isset($data->prefooter_trio) && $data->prefooter_trio != "") { ?>
	<section class="claim-prefooter c-230 mw">
		<div class="group">
			<?php foreach ($data->prefooter_trio as $item) { ?>
				<div class="item">
					<img class="preload" data-preload-desktop="<?php echo $item->image->url ?>" data-preload-mobile="<?php echo $item->image->url ?>">
					<p class="fieldwork-demi"><?php echo $item->text[0]->text ?></p>
				</div>
			<?php } ?>
		</div>
		<button class="purple-btn pulse-anim tilt-el claim-btn">
			<div class="border border-1"></div>
			<div class="border border-2"></div>
			<span><?php echo $data->prefooter_button_text[0]->text ?></span>
		</button>
	</section>
<?php } ?>

<footer class="claim-footer mw c-230">
	<img class="preload" data-preload-desktop="<?php echo prismicReturnImage($data->footer_image->url, "500", "90"); ?>" data-preload-mobile="<?php echo prismicReturnImage($data->footer_image->url, "276", "90"); ?>">
	<div class="link-list fieldwork-reg">
		<?php foreach ($data->footer_link as $link) { ?>
			<a href="<?php echo $link->text[0]->text ?>" target="_blank"><?php echo $link->text[0]->text ?></a>
		<?php } ?>
	</div>
	<p class="fieldwork-light"><?php echo $data->footer_text[0]->text ?></p>
</footer>
