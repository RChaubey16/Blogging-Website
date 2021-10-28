-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 23, 2021 at 03:37 PM
-- Server version: 8.0.26-0ubuntu0.20.04.2
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogsdata`
--

CREATE TABLE `blogsdata` (
  `id` int NOT NULL,
  `blog_id` int NOT NULL,
  `lang_code` varchar(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `blog_title_hindi` varchar(255) NOT NULL,
  `blog_content_hindi` longtext NOT NULL,
  `user_id` int NOT NULL,
  `blog_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blogsdata`
--

INSERT INTO `blogsdata` (`id`, `blog_id`, `lang_code`, `title`, `content`, `blog_title_hindi`, `blog_content_hindi`, `user_id`, `blog_image`, `category`) VALUES
(3, 3, 'en', 'Bright Bazaar', '<p>Bright Bazaar was created by Will Taylor, a journalist-turned-interior designer in 2009. Apart from wonderful home tours and design findings, Will shares other exciting details about his lifestyle, including his outfits, recipes, and life in New York City. Yeah.</p>\r\n', 'ब्राइट बाज़ार', '<p>&nbsp;</p>\r\n\r\n<p>ब्राइट बाज़ार को 2009 में पत्रकार से इंटीरियर डिज़ाइनर बने विल टेलर द्वारा बनाया गया था। अद्भुत घरेलू दौरों और डिज़ाइन निष्कर्षों के अलावा, विल अपनी जीवन शैली के बारे में अन्य रोमांचक विवरण साझा करते हैं, जिसमें उनके पहनावे, व्यंजनों और न्यूयॉर्क शहर में जीवन शामिल हैं।&nbsp;</p>\r\n', 1, 'uploads/pexels-chavdar-lungov-3996363.jpg', 'Food'),
(9, 0, 'en', 'Tech Blog', 'One of my favourite type of Blog is the “tech blog”.  Now this isn’t something new to blog about, as Tech bloggers have been blogging about technology news and gadget reviews in detail online since the beginning of the internet, But because it’s such a vast niche, you could carve out yourself a really good angle within the tech blog sphere. The trick is to have your own take on tech and don’t just follow the trend. One area which hasn’t really been covered specifically is eco tech, so something to think about. Maybe a blog specifically covering tech aimed at becoming more environmentally conscious.\r\n\r\nAnyway, here’s a few blogs in the tech niche that I really like and that I feel are doing something different and is thriving when it comes to organic traffic increases and revenue.', 'टेक ब्लॉग', '<pre>\r\nमेरे पसंदीदा प्रकार के ब्लॉग में से एक &quot;तकनीकी ब्लॉग&quot; है। अब यह ब्लॉग के लिए कोई नई बात नहीं है, क्योंकि टेक ब्लॉगर इंटरनेट की शुरुआत से ही प्रौद्योगिकी समाचार और गैजेट समीक्षाओं के बारे में विस्तार से ऑनलाइन ब्लॉगिंग कर रहे हैं, लेकिन क्योंकि यह इतना विशाल स्थान है, आप अपने आप को वास्तव में एक अच्छा कोण बना सकते हैं टेक ब्लॉग क्षेत्र के भीतर। चाल यह है कि आप तकनीक पर अपना ध्यान रखें और केवल प्रवृत्ति का पालन न करें। एक क्षेत्र जिसे वास्तव में विशेष रूप से कवर नहीं किया गया है वह है इको टेक, इसलिए सोचने के लिए कुछ। हो सकता है कि विशेष रूप से तकनीक को कवर करने वाला ब्लॉग पर्यावरण के प्रति अधिक जागरूक बनने के उद्देश्य से हो।\r\n\r\nवैसे भी, यहाँ तकनीकी क्षेत्र में कुछ ब्लॉग हैं जो मुझे वास्तव में पसंद हैं और मुझे लगता है कि कुछ अलग कर रहे हैं और जब जैविक ट्रैफ़िक बढ़ने और राजस्व की बात आती है तो यह फल-फूल रहा है।</pre>\r\n', 5, 'uploads/ilya-pavlov-OqtafYT5kTw-unsplash.jpg', 'Technology'),
(10, 0, 'en', 'SideHustleNation.com', 'Side Hustle is an online community of entrepreneurs who’s goal is to gain financial freedom through creating businesses that can help them achieve that. There’s a collection of highly actionable blog posts on how to make additional income on top of your day job wage. They make good use of the podcast medium of content marketing by creating various podcasts with experts talking about a whole range of topics around entrepreneurship, making money online and creating wealth.', 'साइडहसल नेशन', '<p>&nbsp;</p>\r\n\r\n<p>साइड हसल उद्यमियों का एक ऑनलाइन समुदाय है जिसका लक्ष्य ऐसे व्यवसाय बनाकर वित्तीय स्वतंत्रता हासिल करना है जो उन्हें हासिल करने में मदद कर सकें। अपने दिन के काम के वेतन के ऊपर अतिरिक्त आय कैसे करें, इस पर अत्यधिक कार्रवाई योग्य ब्लॉग पोस्ट का एक संग्रह है। वे विभिन्न पॉडकास्ट बनाकर सामग्री विपणन के पॉडकास्ट माध्यम का अच्छा उपयोग करते हैं, जिसमें विशेषज्ञ उद्यमिता के आसपास के विषयों की एक पूरी श्रृंखला के बारे में बात करते हैं, ऑनलाइन पैसा कमाते हैं और धन बनाते हैं।</p>\r\n', 5, 'uploads/IMG-61232d1907e215.46357548.jpg', 'Startups'),
(11, 0, 'en', 'CupOfJo.com', 'One of the best mommy bloggers around, Joanna has a really simple looking blog, full to the brim of useful stuff for old and new mothers alike. What I love about this site is the simplicity of the theme, the really current design features and the typography. The blog post ideas are really clever as well and sets Jo’s site apart from all the other mommy bloggers.', 'कपऑफजो', '<pre>\r\nआसपास के सबसे अच्छे माँ ब्लॉगर्स में से एक, जोआना का वास्तव में सरल दिखने वाला ब्लॉग है, जो पुरानी और नई माताओं के लिए समान रूप से उपयोगी सामग्री से भरा है। इस साइट के बारे में मुझे जो पसंद है वह है विषय की सादगी, वास्तव में वर्तमान डिज़ाइन सुविधाएँ और टाइपोग्राफी। ब्लॉग पोस्ट के विचार वास्तव में भी चतुर हैं और जो की साइट को अन्य सभी माँ ब्लॉगर्स से अलग करते हैं।</pre>\r\n', 5, 'uploads/pexels-chavdar-lungov-3996363.jpg', 'Travel'),
(14, 0, 'en', '5 Chirsotpher Nolan Movies', '1. Inception.\r\n2. The Dark Knight.\r\n3. The Dark Knight Rises.\r\n4. Interstellar.\r\n5. Tenet.', '5 चिरसोथेर नोलन मूवीज', '<p>1. स्थापना।<br />\r\n2. द डार्क नाइट।<br />\r\n3. डार्क नाइट उगता है।<br />\r\n4. इंटरस्टेलर।<br />\r\n5. सिद्धांत।</p>\r\n', 7, 'uploads/myke-simon-atsUqIm3wxo-unsplash.jpg', 'Movies'),
(15, 0, 'en', 'NerdFitness [Exercise/Physical Fitness]', 'Steve Kamb is a guy well known in the marketing niche, but he doesn’t write about marketing.\r\n\r\nThat’s because his blog has served as a great example of how to build a successful site full of an endearing personality, outside of the blogging/marketing niche of course.\r\n\r\nThis is one of the great advantages of being someone knowledgeable in content marketing: you can offer up your success story to all sorts of marketing blogs if you create a popular site in a atypical topic.\r\n\r\nMarketing blogs absolutely love case studies of this kind, and you’ll get attention and links just by telling your story. It’s a method Steve has used multiple times to appear on sites like Lifehacker and ThinkTraffic.\r\n\r\n', 'NerdFitness [व्यायाम/शारीरिक स्वास्थ्य]', '<p>स्टीव काम्ब एक ऐसे व्यक्ति हैं जो मार्केटिंग के क्षेत्र में जाने जाते हैं, लेकिन वह मार्केटिंग के बारे में नहीं लिखते हैं।</p>\r\n\r\n<p>ऐसा इसलिए है क्योंकि उनके ब्लॉग ने निश्चित रूप से ब्लॉगिंग / मार्केटिंग आला के बाहर, एक प्यारे व्यक्तित्व से भरी एक सफल साइट बनाने का एक महान उदाहरण के रूप में कार्य किया है।</p>\r\n\r\n<p>यह सामग्री विपणन में जानकार होने के महान लाभों में से एक है: यदि आप असामान्य विषय में एक लोकप्रिय साइट बनाते हैं तो आप सभी प्रकार के मार्केटिंग ब्लॉगों को अपनी सफलता की कहानी पेश कर सकते हैं।</p>\r\n\r\n<p>मार्केटिंग ब्लॉग इस तरह के केस स्टडी को बिल्कुल पसंद करते हैं, और आपको अपनी कहानी बताकर ही ध्यान और लिंक मिल जाएंगे। यह एक तरीका है जिसे स्टीव ने लाइफहाकर और थिंकट्रैफिक जैसी साइटों पर प्रदर्शित होने के लिए कई बार इस्तेमाल किया है।</p>\r\n', 3, 'uploads/risen-wang-20jX9b35r_M-unsplash.jpg', 'Fitness'),
(16, 0, 'en', 'StudyHacks', 'I am actually a consistent reader of Cal Newport’s blog (known as StudyHacks), although recently he has moved on to “career hacks” in that he addresses career and job advice over studying in college.\r\n\r\nOne thing I love about Cal’s blog is that is isn’t afraid to speak out against the status quo, yet only does so when he has data and a strong argument to present.\r\n\r\nHe doesn’t stir up controversy just to do so, yet many of his posts are controversial because he cites evidence that goes against a lot of beliefs that we often hold. (For instance, he doesn’t believe in “Following your passion”, that definitely threw me for a loop!)', '', '', 4, 'uploads/susan-q-yin-2JIvboGLeho-unsplash.jpg', 'Study'),
(28, 0, 'en', 'How to Create a Successful MVP in Web Development?', 'What do Uber, Instagram, Facebook, and Twitter have in common? They all used a Minimum Viable Product (MVP) approach to build features and test their hypothesis. They gathered customer feedback to evolve into a fully mature application over time. An MVP is a releasable version of a product that supports minimal yet must-have features. An MVP helps enterprises to learn how their ideas can benefit users.\r\n\r\nYou must be wondering how MVP was born. Nick Swinmurn introduced the concept of MVP to the world. It all started when he was unable to find his favourite pair of shoes at the mall. He decided to manufacture and sell shoes online. Without conducting thorough market research, he launched an e-commerce website to sell his products. The MVP approach helped him test the hypothesis. Later, when his products became famous, he turned the approach into a fully functional business model.\r\n\r\nAccording to the University of Toronto, the failure rate of new products in the retail industry is around 70-80%. The failure rate is more or less similar across all the sectors. According to Clayton Christensen, about 95% of new products fail. Funding is not the only reason behind the failure. There are several reasons for a product failure. A product failure could result from market viability, lack of clear business, or marketing strategy. Therefore, it is necessary to create a go-to-market strategy if you want to avoid common product failures and achieve success in a competitive environment.', 'वेब डेवलपमेंट में एक सफल एमवीपी कैसे बनाएं?', '<pre>\r\nUber, Instagram, Facebook और Twitter में क्या समानता है? उन सभी ने सुविधाओं के निर्माण और उनकी परिकल्पना का परीक्षण करने के लिए न्यूनतम व्यवहार्य उत्पाद (एमवीपी) दृष्टिकोण का उपयोग किया। उन्होंने समय के साथ पूरी तरह से परिपक्व एप्लिकेशन में विकसित होने के लिए ग्राहकों की प्रतिक्रिया एकत्र की। एक एमवीपी एक उत्पाद का एक रिलीज करने योग्य संस्करण है जो कम से कम सुविधाओं का समर्थन करता है। एक एमवीपी उद्यमों को यह जानने में मदद करता है कि उनके विचार उपयोगकर्ताओं को कैसे लाभ पहुंचा सकते हैं।\r\n\r\nआप सोच रहे होंगे कि एमवीपी का जन्म कैसे हुआ। निक स्विनमर्न ने एमवीपी की अवधारणा को दुनिया के सामने पेश किया। यह सब तब शुरू हुआ जब उन्हें मॉल में अपने पसंदीदा जूते नहीं मिले। उन्होंने ऑनलाइन जूते बनाने और बेचने का फैसला किया। पूरी तरह से बाजार अनुसंधान किए बिना, उन्होंने अपने उत्पादों को बेचने के लिए एक ई-कॉमर्स वेबसाइट लॉन्च की। एमवीपी दृष्टिकोण ने उन्हें परिकल्पना का परीक्षण करने में मदद की। बाद में, जब उनके उत्पाद प्रसिद्ध हुए, तो उन्होंने इस दृष्टिकोण को पूरी तरह कार्यात्मक व्यवसाय मॉडल में बदल दिया।\r\n\r\nटोरंटो विश्वविद्यालय के अनुसार, खुदरा उद्योग में नए उत्पादों की विफलता दर लगभग 70-80% है। विफलता दर कमोबेश सभी क्षेत्रों में समान है। क्लेटन क्रिस्टेंसन के अनुसार, लगभग 95% नए उत्पाद विफल हो जाते हैं। विफलता के पीछे केवल फंडिंग ही कारण नहीं है। उत्पाद की विफलता के कई कारण हैं। उत्पाद की विफलता बाजार की व्यवहार्यता, स्पष्ट व्यवसाय की कमी या विपणन रणनीति के परिणामस्वरूप हो सकती है। इसलिए, यदि आप सामान्य उत्पाद विफलताओं से बचना चाहते हैं और प्रतिस्पर्धी माहौल में सफलता प्राप्त करना चाहते हैं, तो बाजार में जाने की रणनीति बनाना आवश्यक है।</pre>\r\n', 1, 'uploads/ilya-pavlov-OqtafYT5kTw-unsplash.jpg', 'Web Development'),
(31, 0, 'en', 'Advanced Human Performance', 'Anyone feeling frustrated by a fitness plateau will find help from Advanced Human Performance creator Joel Seedman, PhD. He started this site to help people break through their nutritional and training barriers. He provides the most advanced, scientifically proven methods. The blog features comprehensive information relating to specialized exercises and tips for improving technique and function.', 'उन्नत मानव प्रदर्शन', '<p>फिटनेस पठार से निराश महसूस करने वाला कोई भी व्यक्ति उन्नत मानव प्रदर्शन निर्माता जोएल सेडमैन, पीएचडी से सहायता प्राप्त करेगा। उन्होंने लोगों को उनके पोषण और प्रशिक्षण बाधाओं को तोड़ने में मदद करने के लिए इस साइट की शुरुआत की। वह सबसे उन्नत, वैज्ञानिक रूप से सिद्ध तरीके प्रदान करता है। ब्लॉग में विशेष अभ्यासों से संबंधित विस्तृत जानकारी और तकनीक और कार्य में सुधार के लिए सुझाव दिए गए हैं।</p>\r\n', 3, 'uploads/risen-wang-20jX9b35r_M-unsplash.jpg', 'Fitness'),
(48, 0, 'en', 'The Himalayas', 'We sat down with trekking legend and Lonely Planet author, Garry Weare, to delve into his life-long passion for the Indian Himalaya.\r\n\r\nGarry has been involved with World Expeditions since its beginnings in the mid-1970s and is a recognised authority on the Indian Himalaya.\r\n\r\nHis intimate knowledge of the region is documented in his Lonely Planet guidebook, Trekking in the Indian Himalaya and his acclaimed narrative, A Long Walk in The Himalaya – an intriguing account of his five-month trek from the source of the Ganges to Kashmir.', 'हिमालय', '<p>&nbsp;</p>\r\n\r\n<p>हम भारतीय हिमालय के लिए अपने जीवन भर के जुनून में तल्लीन करने के लिए ट्रेकिंग लीजेंड और लोनली प्लैनेट लेखक गैरी वेयर के साथ बैठे। गैरी 1970 के दशक के मध्य से विश्व अभियानों में शामिल रहे हैं और भारतीय हिमालय पर एक मान्यता प्राप्त प्राधिकरण हैं। इस क्षेत्र के बारे में उनका अंतरंग ज्ञान उनकी लोनली प्लैनेट गाइडबुक, ट्रेकिंग इन द इंडियन हिमालया और उनकी प्रशंसित कथा, ए लॉन्ग वॉक इन द हिमालया में प्रलेखित है - गंगा के स्रोत से कश्मीर तक उनके पांच महीने के ट्रेक का एक दिलचस्प विवरण।</p>\r\n', 1, 'uploads/Himalayas.jpg', 'Travel'),
(61, 0, 'en', 'Perseverance Mars Rover', '<p>NASA&rsquo;s Perseverance Mars rover has sent back its first image(s) from the surface of the Red Planet. The image(s) come from Perseverance&rsquo;s Hazard Avoidance Cameras (Hazcams), which help with driving. The clear protective covers over these cameras are still on. These first images are low-resolution versions known as &ldquo;thumbnails.&rdquo; Higher-resolution versions will be available later. Cheers erupted in mission control at NASA&rsquo;s Jet Propulsion Laboratory as controllers confirmed that NASA&rsquo;s Perseverance rover, with the Ingenuity Mars Helicopter attached to its belly, has touched down safely on Mars. Engineers are analyzing the data flowing back from the spacecraft. Yay!</p>\r\n', 'दृढ़ता मंगल रोवर', '<pre>\r\nनासा के दृढ़ता मंगल रोवर ने लाल ग्रह की सतह से अपनी पहली छवि वापस भेज दी है। छवियां दृढ़ता के खतरे से बचने वाले कैमरे (हैज़कैम) से आती हैं, जो ड्राइविंग में मदद करती हैं। इन कैमरों के ऊपर स्पष्ट सुरक्षा कवच अभी भी चालू हैं। ये पहली छवियां कम-रिज़ॉल्यूशन संस्करण हैं जिन्हें &quot;थंबनेल&quot; कहा जाता है। उच्च-रिज़ॉल्यूशन संस्करण बाद में उपलब्ध होंगे। नासा के जेट प्रोपल्शन लेबोरेटरी में मिशन नियंत्रण में चीयर्स भड़क उठे क्योंकि नियंत्रकों ने पुष्टि की कि नासा के दृढ़ता रोवर, उसके पेट से जुड़े इनजेनिटी मार्स हेलीकॉप्टर के साथ, मंगल पर सुरक्षित रूप से छू गया है। इंजीनियर अंतरिक्ष यान से वापस आने वाले डेटा का विश्लेषण <strong>कर रहे हैं।</strong></pre>\r\n', 8, 'uploads/pexels-tom-leishman-5259407.jpg', 'Space'),
(69, 0, 'en', 'One Day In Grand Canyon', 'The Grand Canyon is a world-famous rock formation along the Colorado River in northern Arizona. The giant canyon spans 277 miles (446 km) and is 1 mile (1.6 km) deep. Scientists estimate that the impressive gorge formed around 6 million years ago. In 1919, it became a protected national park and today is one of America’s most popular sights. \r\n\r\nThe park attracts 5.5 million people every year, most of whom come to the Grand Canyon for a day or two. The formation of the Grand Canyon is what makes this immense landscape so unique. The canyon is a result of a combination of geological activity and erosion by the Colorado River. ', 'ग्रांड कैन्यन में एक दिन', '<p>ग्रांड कैन्यन उत्तरी एरिज़ोना में कोलोराडो नदी के किनारे एक विश्व प्रसिद्ध चट्टान है। विशाल घाटी 277 मील (446 किमी) तक फैली हुई है और 1 मील (1.6 किमी) गहरी है। वैज्ञानिकों का अनुमान है कि प्रभावशाली कण्ठ लगभग 6 मिलियन वर्ष पहले बना था। 1919 में, यह एक संरक्षित राष्ट्रीय उद्यान बन गया और आज यह अमेरिका के सबसे लोकप्रिय स्थलों में से एक है।</p>\r\n\r\n<p>पार्क हर साल 5.5 मिलियन लोगों को आकर्षित करता है, जिनमें से अधिकांश एक या दो दिन के लिए ग्रांड कैन्यन आते हैं। ग्रांड कैन्यन का निर्माण इस विशाल परिदृश्य को इतना अनूठा बनाता है। घाटी कोलोराडो नदी द्वारा भूवैज्ञानिक गतिविधि और कटाव के संयोजन का परिणाम है।</p>\r\n', 7, 'uploads/IMG-611ce0b48e83c0.07057890.jpg', 'Travel'),
(82, 0, 'en', 'My Day in NYC!', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>\r\n\r\n<p style=\"margin-left:40px\"><strong><span style=\"color:#8e44ad\">Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span></strong></p>\r\n\r\n<p style=\"margin-left:40px\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:40px\"><span style=\"color:#8e44ad\"><img alt=\"nyc image\" src=\"https://images.unsplash.com/photo-1506111583091-becfd4bfa05d?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1050&amp;q=80\" style=\"float:right; height:285px; width:363px\" /></span></p>\r\n\r\n<p><br />\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:18px\">Lorem Ipsum has been the industry&#39;s</span></li>\r\n	<li><span style=\"font-size:18px\">The generated Lorem Ipsum is therefore always</span></li>\r\n	<li><span style=\"font-size:18px\">Making this the first true generator</span></li>\r\n</ul>\r\n\r\n<p><br />\r\n<span style=\"font-family:Georgia,serif\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English.</span></p>\r\n', '', '', 1, 'uploads/pexels-fernando-gonzalez-4331280.jpg', 'Travel'),
(87, 0, 'en', 'Site Studio - Theme Architecture', '<p>We are all familiar with&nbsp;<a href=\"https://www.qed42.com/blog/Cohesion-low-code-enterprise-grade-Drupal-website-building-platform\">Acquia Site Studio</a>, a low-code tool for creating digital experience platforms. While working on Site Studio developers mostly work on the site-building part instead of writing code in the CSS or JS files. However, at times, there are cases where you can&rsquo;t achieve expected things using Site Studio because there is no way to access that particular thing in Site Studio.&nbsp;</p>\r\n\r\n<p>For instance the Drupal maintenance page can&rsquo;t be themed in Site Studio because there is no access of Site Studio on these pages, another example if we require some custom things like JS/CSS, we can&rsquo;t do in Site Studio using site-building because of restricted&nbsp;access, in such cases, we need to set up Site Studio theme architecture to achieve expected things with minimal files, code and overwrite.<br />\r\n&nbsp;</p>\r\n\r\n<h2><strong>Site studio theme architecture will be based on below things</strong></h2>\r\n\r\n<h4><strong>Base theme</strong></h4>\r\n\r\n<ul>\r\n	<li>Site Studio minimal (machine name: cohesion-theme)</li>\r\n	<li>Directory: docroot/themes/contrib/cohesion-theme</li>\r\n</ul>\r\n\r\n<h4><strong>Sub-theme</strong></h4>\r\n\r\n<ul>\r\n	<li>Fluffiness (default theme) (machine name: fluffiness)</li>\r\n	<li>Directory: docroot/themes/custom/fluffiness</li>\r\n</ul>\r\n', 'साइट स्टूडियो - थीम आर्किटेक्चर', '<pre>\r\nहम सभी Acquia Site Studio से परिचित हैं, जो डिजिटल अनुभव प्लेटफॉर्म बनाने के लिए एक निम्न-कोड उपकरण है। साइट स्टूडियो पर काम करते समय डेवलपर्स ज्यादातर सीएसएस या जेएस फाइलों में कोड लिखने के बजाय साइट-बिल्डिंग भाग पर काम करते हैं। हालांकि, कभी-कभी, ऐसे मामले होते हैं जहां आप साइट स्टूडियो का उपयोग करके अपेक्षित चीजें हासिल नहीं कर सकते क्योंकि साइट स्टूडियो में उस विशेष चीज़ तक पहुंचने का कोई तरीका नहीं है।\r\n\r\nउदाहरण के लिए साइट स्टूडियो में ड्रूपल रखरखाव पृष्ठ को थीम नहीं किया जा सकता है क्योंकि इन पृष्ठों पर साइट स्टूडियो की कोई पहुंच नहीं है, एक अन्य उदाहरण यदि हमें जेएस/सीएसएस जैसी कुछ कस्टम चीजों की आवश्यकता है, तो हम साइट स्टूडियो में साइट का उपयोग नहीं कर सकते हैं- प्रतिबंधित पहुंच के कारण निर्माण, ऐसे मामलों में, हमें न्यूनतम फाइलों, कोड और ओवरराइट के साथ अपेक्षित चीजों को प्राप्त करने के लिए साइट स्टूडियो थीम आर्किटेक्चर स्थापित करने की आवश्यकता है।</pre>\r\n', 1, 'uploads/pexels-pixabay-531321.jpg', 'Teachnology'),
(200, 3, 'hi', 'ब्राइट बाज़ार', '<p>&nbsp;</p>\r\n\r\n<p>ब्राइट बाज़ार को 2009 में पत्रकार से इंटीरियर डिज़ाइनर बने विल टेलर द्वारा बनाया गया था। अद्भुत घरेलू दौरों और डिज़ाइन निष्कर्षों के अलावा, विल अपनी जीवन शैली के बारे में अन्य रोमांचक विवरण साझा करते हैं, जिसमें उनके पहनावे, व्यंजनों और न्यूयॉर्क शहर में जीवन शामिल हैं।&nbsp;</p>\r\n', '', '', 1, 'uploads/pexels-chavdar-lungov-3996363.jpg', 'Food'),
(202, 28, 'hi', 'वेब डेवलपमेंट में एक सफल एमवीपी कैसे बनाएं?', '<pre>\r\nUber, Instagram, Facebook और Twitter में क्या समानता है? उन सभी ने सुविधाओं के निर्माण और उनकी परिकल्पना का परीक्षण करने के लिए न्यूनतम व्यवहार्य उत्पाद (एमवीपी) दृष्टिकोण का उपयोग किया। उन्होंने समय के साथ पूरी तरह से परिपक्व एप्लिकेशन में विकसित होने के लिए ग्राहकों की प्रतिक्रिया एकत्र की। एक एमवीपी एक उत्पाद का एक रिलीज करने योग्य संस्करण है जो कम से कम सुविधाओं का समर्थन करता है। एक एमवीपी उद्यमों को यह जानने में मदद करता है कि उनके विचार उपयोगकर्ताओं को कैसे लाभ पहुंचा सकते हैं।\r\n\r\nआप सोच रहे होंगे कि एमवीपी का जन्म कैसे हुआ। निक स्विनमर्न ने एमवीपी की अवधारणा को दुनिया के सामने पेश किया। यह सब तब शुरू हुआ जब उन्हें मॉल में अपने पसंदीदा जूते नहीं मिले। उन्होंने ऑनलाइन जूते बनाने और बेचने का फैसला किया। पूरी तरह से बाजार अनुसंधान किए बिना, उन्होंने अपने उत्पादों को बेचने के लिए एक ई-कॉमर्स वेबसाइट लॉन्च की। एमवीपी दृष्टिकोण ने उन्हें परिकल्पना का परीक्षण करने में मदद की। बाद में, जब उनके उत्पाद प्रसिद्ध हुए, तो उन्होंने इस दृष्टिकोण को पूरी तरह कार्यात्मक व्यवसाय मॉडल में बदल दिया।\r\n\r\nटोरंटो विश्वविद्यालय के अनुसार, खुदरा उद्योग में नए उत्पादों की विफलता दर लगभग 70-80% है। विफलता दर कमोबेश सभी क्षेत्रों में समान है। क्लेटन क्रिस्टेंसन के अनुसार, लगभग 95% नए उत्पाद विफल हो जाते हैं। विफलता के पीछे केवल फंडिंग ही कारण नहीं है। उत्पाद की विफलता के कई कारण हैं। उत्पाद की विफलता बाजार की व्यवहार्यता, स्पष्ट व्यवसाय की कमी या विपणन रणनीति के परिणामस्वरूप हो सकती है। इसलिए, यदि आप सामान्य उत्पाद विफलताओं से बचना चाहते हैं और प्रतिस्पर्धी माहौल में सफलता प्राप्त करना चाहते हैं, तो बाजार में जाने की रणनीति बनाना आवश्यक है।</pre>\r\n', '', '', 1, 'uploads/ilya-pavlov-OqtafYT5kTw-unsplash.jpg', 'Web Development'),
(203, 48, 'hi', 'हिमालय', '<p>&nbsp;</p>\r\n\r\n<p>हम भारतीय हिमालय के लिए अपने जीवन भर के जुनून में तल्लीन करने के लिए ट्रेकिंग लीजेंड और लोनली प्लैनेट लेखक गैरी वेयर के साथ बैठे। गैरी 1970 के दशक के मध्य से विश्व अभियानों में शामिल रहे हैं और भारतीय हिमालय पर एक मान्यता प्राप्त प्राधिकरण हैं। इस क्षेत्र के बारे में उनका अंतरंग ज्ञान उनकी लोनली प्लैनेट गाइडबुक, ट्रेकिंग इन द इंडियन हिमालया और उनकी प्रशंसित कथा, ए लॉन्ग वॉक इन द हिमालया में प्रलेखित है - गंगा के स्रोत से कश्मीर तक उनके पांच महीने के ट्रेक का एक दिलचस्प विवरण।</p>\r\n', '', '', 1, 'uploads/Himalayas.jpg', 'Travel'),
(204, 87, 'hi', 'साइट स्टूडियो - थीम आर्किटेक्चर', '<pre>\r\nहम सभी Acquia Site Studio से परिचित हैं, जो डिजिटल अनुभव प्लेटफॉर्म बनाने के लिए एक निम्न-कोड उपकरण है। साइट स्टूडियो पर काम करते समय डेवलपर्स ज्यादातर सीएसएस या जेएस फाइलों में कोड लिखने के बजाय साइट-बिल्डिंग भाग पर काम करते हैं। हालांकि, कभी-कभी, ऐसे मामले होते हैं जहां आप साइट स्टूडियो का उपयोग करके अपेक्षित चीजें हासिल नहीं कर सकते क्योंकि साइट स्टूडियो में उस विशेष चीज़ तक पहुंचने का कोई तरीका नहीं है।\r\n\r\nउदाहरण के लिए साइट स्टूडियो में ड्रूपल रखरखाव पृष्ठ को थीम नहीं किया जा सकता है क्योंकि इन पृष्ठों पर साइट स्टूडियो की कोई पहुंच नहीं है, एक अन्य उदाहरण यदि हमें जेएस/सीएसएस जैसी कुछ कस्टम चीजों की आवश्यकता है, तो हम साइट स्टूडियो में साइट का उपयोग नहीं कर सकते हैं- प्रतिबंधित पहुंच के कारण निर्माण, ऐसे मामलों में, हमें न्यूनतम फाइलों, कोड और ओवरराइट के साथ अपेक्षित चीजों को प्राप्त करने के लिए साइट स्टूडियो थीम आर्किटेक्चर स्थापित करने की आवश्यकता है।</pre>\r\n', '', '', 1, 'uploads/pexels-pixabay-531321.jpg', 'Teachnology'),
(205, 61, 'hi', 'दृढ़ता मंगल रोवर', '<pre>\r\nनासा के दृढ़ता मंगल रोवर ने लाल ग्रह की सतह से अपनी पहली छवि वापस भेज दी है। छवियां दृढ़ता के खतरे से बचने वाले कैमरे (हैज़कैम) से आती हैं, जो ड्राइविंग में मदद करती हैं। इन कैमरों के ऊपर स्पष्ट सुरक्षा कवच अभी भी चालू हैं। ये पहली छवियां कम-रिज़ॉल्यूशन संस्करण हैं जिन्हें &quot;थंबनेल&quot; कहा जाता है। उच्च-रिज़ॉल्यूशन संस्करण बाद में उपलब्ध होंगे। नासा के जेट प्रोपल्शन लेबोरेटरी में मिशन नियंत्रण में चीयर्स भड़क उठे क्योंकि नियंत्रकों ने पुष्टि की कि नासा के दृढ़ता रोवर, उसके पेट से जुड़े इनजेनिटी मार्स हेलीकॉप्टर के साथ, मंगल पर सुरक्षित रूप से छू गया है। इंजीनियर अंतरिक्ष यान से वापस आने वाले डेटा का विश्लेषण <strong>कर रहे हैं।</strong></pre>\r\n', '', '', 8, 'uploads/pexels-tom-leishman-5259407.jpg', 'Space');

-- --------------------------------------------------------

--
-- Table structure for table `blog_likes`
--

CREATE TABLE `blog_likes` (
  `id` int NOT NULL,
  `user` int NOT NULL,
  `blog` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blog_likes`
--

INSERT INTO `blog_likes` (`id`, `user`, `blog`) VALUES
(2, 1, 15),
(4, 1, 9),
(6, 5, 2),
(7, 5, 15),
(11, 4, 11),
(20, 4, 9),
(22, 4, 16),
(23, 5, 28),
(25, 5, 16),
(26, 3, 31),
(27, 8, 16),
(29, 1, 48),
(30, 8, 60),
(33, 8, 15),
(38, 1, 2),
(41, 1, 67),
(42, 8, 67),
(44, 8, 69),
(46, 8, 2),
(47, 8, 3),
(48, 8, 82);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `comment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `uid` int NOT NULL,
  `bid` int NOT NULL,
  `likes` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `uid`, `bid`, `likes`) VALUES
(1, 'Great!', 3, 15, 0),
(2, 'Nice one', 3, 15, 0),
(3, 'Wow', 7, 16, 0),
(4, 'Nice one', 4, 16, 0),
(5, 'Great!', 1, 9, 0),
(6, 'Wow', 1, 14, 1),
(7, 'cheers', 1, 16, 0),
(8, 'woah!!', 1, 16, 0),
(9, 'Great Words!', 5, 16, 0),
(10, 'Great!', 5, 16, 0),
(11, 'Nice one', 5, 16, 0),
(12, 'Comment 1', 5, 14, 0),
(13, 'Woah! Good one!!', 3, 11, 0),
(15, 'Test', 3, 3, 0),
(16, 'Hey!!', 3, 10, 0),
(17, 'Hi!!', 1, 16, 0),
(18, 'Great one!', 8, 31, 1),
(20, 'Mars :)', 8, 61, 3),
(21, 'Great', 8, 28, 1),
(22, 'Woah!', 1, 48, 0),
(23, 'Hi', 8, 82, 1);

-- --------------------------------------------------------

--
-- Table structure for table `forgotpassword`
--

CREATE TABLE `forgotpassword` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `release_time` varchar(255) NOT NULL,
  `expire_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `forgotpassword`
--

INSERT INTO `forgotpassword` (`id`, `user_id`, `release_time`, `expire_time`) VALUES
(24, 13, '18:35:45', '18:50:45');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int NOT NULL,
  `image_order` int NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image_order`, `image`) VALUES
(9, 1, 'IMG-611ce0a06a3ee4.29901950.jpg '),
(10, 3, 'IMG-611ce0b48e83c0.07057890.jpg '),
(24, 3, 'IMG-612318488b3400.33772507.jpg '),
(27, 2, 'IMG-6136103f456645.61615402.jpg ');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`) VALUES
(54, 'ruturaj.chaubey@qed42.com'),
(46, 'ruturajchaubey16@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `user_id` int NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `bio` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`user_id`, `name`, `email`, `password`, `bio`, `date`) VALUES
(1, 'Tony Stark', 'ironman@avengers.cpm', '12345', 'Movies Blogger.\r\nI am Iron Man!', '2021-08-15 11:37:45'),
(3, 'Bruce Wayne', 'bruce@batman.com', '12345', 'Fitness Blogger.', '2021-08-20 11:55:32'),
(4, 'Steve Rogers', 'steve@cap.com', '12345', 'Study Blogs :)', '2021-08-20 11:56:34'),
(5, 'Elon Musk', 'elon@elon.com', '12345', 'Tech Husky!', '2021-08-20 11:57:23'),
(7, 'Peter Parker', 'peter@peter.com', '12345', 'Movies :D', '2021-08-20 14:10:58'),
(8, 'John', 'j@j.com', '12345', 'Tech Blogger!', '2021-08-25 18:51:15'),
(11, 'flash', 'flash@flash.com', '12345', '', '2021-09-07 17:40:37'),
(13, 'Ruturaj Chaubey', 'ruturajchaubey16@gmail.com', '$2y$10$1wcQsZ7tL8qJXdFxcAoWIuONCf4XTKOS1voGhe2ptIXHLBUy/K0EW', 'Hey! :)', '2021-09-17 11:58:16'),
(14, 'abc', 'abc@abc.com', '$2y$10$XHj9WSuWPIoB6SPBW4FeJOpfSTYk7DaE/9P4yskhztELVRwgoCEpi', '', '2021-09-20 10:51:31'),
(15, 'xyz', 'xyz@xyz.com', '$2y$10$LO9o5.fSVpWKNd2jxq8OVu/ILmUQQKv9K51gjydlBxVMydv.8pDdq', '', '2021-09-20 11:50:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogsdata`
--
ALTER TABLE `blogsdata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `blog_likes`
--
ALTER TABLE `blog_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`uid`),
  ADD KEY `bid` (`bid`);

--
-- Indexes for table `forgotpassword`
--
ALTER TABLE `forgotpassword`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogsdata`
--
ALTER TABLE `blogsdata`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT for table `blog_likes`
--
ALTER TABLE `blog_likes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `forgotpassword`
--
ALTER TABLE `forgotpassword`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogsdata`
--
ALTER TABLE `blogsdata`
  ADD CONSTRAINT `blogsdata_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `userdetails` (`user_id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `userdetails` (`user_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `blogsdata` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
