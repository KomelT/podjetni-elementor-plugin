<?php
if (!defined("ABSPATH")) {
    exit();
}

/**
 * Podjetni Course Card widget
 * @since 1.0.0
 */
class Elementor_Podjetni_Course_Card extends \Elementor\Widget_Base
{
    /**
     * Get widget name
     */
    public function get_name()
    {
        return "podjetni_course_card";
    }

    /**
     * Get widget title
     */
    public function get_title()
    {
        return esc_html__("Course card", "podjetni-elementor");
    }

    /**
     * Get widget icon
     */
    public function get_icon()
    {
        return "eicon-menu-card";
    }

    /**
     * Get custom help URL
     */
    public function get_custom_help_url()
    {
        return "https://podjetni.si/";
    }

    /**
     * Get widget categories
     */
    public function get_categories()
    {
        return ["podjetni"];
    }

    /**
     * Get widget keywords
     */
    public function get_keywords()
    {
        return ["course"];
    }

    /**
     * Get widget styles
     */
    public function get_style_depends()
    {
        return [];
    }

    /**
     * Get widget scripts
     */
    public function get_script_depends()
    {
        return [];
    }

    /**
     * Register widget controls.
     */
    protected function register_controls()
    {
        $this->start_controls_section("content_section", [
            "label" => esc_html__("Content", "podjetni-elementor"),
            "tab" => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control("course-image", [
            "label" => esc_html__("Course Image", "podjetni-elementor"),
            "type" => \Elementor\Controls_Manager::MEDIA,
            "default" => [
                "url" => \Elementor\Utils::get_placeholder_image_src(),
            ],
        ]);

        $this->add_control("course-title", [
            "label" => esc_html__("Course Title", "podjetni-elementor"),
            "type" => \Elementor\Controls_Manager::TEXT,
            "input_type" => "text",
        ]);

        $this->add_control("course-author", [
            "label" => esc_html__("Course Author", "podjetni-elementor"),
            "type" => \Elementor\Controls_Manager::TEXT,
            "input_type" => "text",
        ]);

        $this->add_control("course-lp-url", [
            "label" => esc_html__("Landing Page Link", "podjetni-elementor"),
            "type" => \Elementor\Controls_Manager::URL,
            "options" => ["url", "is_external"],
            "default" => [
                "url" => "",
                "is_external" => false,
            ],
            "label_block" => true,
        ]);

        $this->add_control("course-button-text", [
            "label" => esc_html__("Button Text", "podjetni-elementor"),
            "type" => \Elementor\Controls_Manager::TEXT,
            "input_type" => "text",
        ]);

        $this->end_controls_section();
    }

    /**
     * Render output on the frontend
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display(); ?>

        <section class="course-card">
        <div class="etlms-course-list-col">
            <div
            class="tutor-course-card etlms-course-card-stacked etlms-has-hover-animation" >
            <div class="tutor-course-thumbnail">
                <a
                href="<?php echo esc_attr(
                    $settings["course-lp-url"]["url"]
                ); ?>"
                class="tutor-d-block" >
                <div class="tutor-ratio tutor-ratio-16x9">
                    <img
                    decoding="async"
                    class="tutor-card-image-top"
                    src="<?php echo esc_attr(
                        $settings["course-image"]["url"]
                    ); ?>"
                    alt="<?php echo esc_attr(
                        $settings["course-title"]
                    ); ?> fotografija tečaja"
                    loading="lazy"
                    />
                </div>
                </a>
            </div>

            <div class="tutor-card etlms-course-card-inner">
                <div class="tutor-card-body">
                <h3
                    class="tutor-course-name tutor-fs-5 tutor-fw-medium tutor-mb-12"
                    title="<?php echo esc_attr($settings["course-title"]); ?>" >
                    <a
                    href="<?php echo esc_attr(
                        $settings["course-lp-url"]["url"]
                    ); ?>" >
                    <?php echo esc_attr($settings["course-title"]); ?></a>
                </h3>
                <div class="tutor-meta tutor-mt-auto">
                    <div>
                    <span class="etlms-course-author-meta tutor-meta-key">Avtor: </span>
                    <a
                        class="etlms-course-author-meta tutor-meta-value"
                        href="#"
                        ><?php echo esc_attr($settings["course-author"]); ?></a>
                    </div>
                </div>
                </div>

                <div class="tutor-card-footer">
                <div class="list-item-button">
                    <a
                    href="<?php echo esc_attr(
                        $settings["course-lp-url"]["url"]
                    ); ?>"
                    class="tutor-btn tutor-btn-outline-primary tutor-btn-md tutor-btn-block" >
                    <?php echo esc_attr($settings["course-button-text"]); ?>
                    </a>
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>
        
        <?php
    }
}
