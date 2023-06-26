gsap.utils.toArray(".background-image-parallax .picture-background-image img").forEach((section, i) => {
    const heightDiff = section.offsetHeight - section.parentElement.offsetHeight;

    gsap.fromTo(section, { 
        y: -heightDiff
    }, {
        scrollTrigger: {
            trigger: section.parentElement,
            scrub: true
        },
        y: 0,
        ease: "none"
    });
});