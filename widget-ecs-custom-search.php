<?php
class ECS_Custom_Search_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'ecs_custom_search';
    }

    public function get_title()
    {
        return __('ECS Custom Search', 'elementor-custom-search');
    }

    public function get_icon()
    {
        return 'eicon-search';
    }

    public function get_categories()
    {
        return ['basic'];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'elementor-custom-search'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'placeholder',
            [
                'label' => __('Placeholder', 'elementor-custom-search'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Search...', 'elementor-custom-search'),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __('Button Text', 'elementor-custom-search'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Search', 'elementor-custom-search'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => __('Style', 'elementor-custom-search'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'input_background',
            [
                'label' => __('Input Background', 'elementor-custom-search'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} input[type="text"]' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'input_text_color',
            [
                'label' => __('Input Text Color', 'elementor-custom-search'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} input[type="text"]' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'input_padding',
            [
                'label' => __('Input Padding', 'elementor-custom-search'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} input[type="text"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'input_border_radius',
            [
                'label' => __('Input Border Radius', 'elementor-custom-search'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} input[type="text"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'input_font_size',
            [
                'label' => __('Input Font Size', 'elementor-custom-search'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} input[type="text"]' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'button_background',
            [
                'label' => __('Button Background', 'elementor-custom-search'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => __('Button Text Color', 'elementor-custom-search'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => __('Button Padding', 'elementor-custom-search'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_border_radius',
            [
                'label' => __('Button Border Radius', 'elementor-custom-search'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_font_size',
            [
                'label' => __('Button Font Size', 'elementor-custom-search'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} button' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <form id="custom-search-form" action="<?php echo esc_url(home_url('/')); ?>" method="get">
            <input type="text" name="s" placeholder="<?php echo esc_attr($settings['placeholder']); ?>" required>
            <button type="submit"><?php echo esc_html($settings['button_text']); ?></button>
        </form>

    <?php
    }

    protected function _content_template()
    {
    ?>
        <# var placeholder=settings.placeholder ? settings.placeholder : 'Search...' ; var buttonText=settings.button_text ? settings.button_text : 'Search' ; #>

            <form id="custom-search-form" action="<?php echo home_url('/'); ?>" method="get">
                <input type="text" name="s" placeholder="{{{ placeholder }}}" required>
                <button type="submit">{{{ buttonText }}}</button>
            </form>

    <?php
    }
}
    ?>