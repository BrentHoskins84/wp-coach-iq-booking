import { render } from '@wordpress/element';
import { Component } from '@wordpress/element';
import Calendar from "./components/calendar";
import Card from "./components/card";
import Container from "./components/container";
import Row from "./components/row";
import Column from "./components/column";
class PluginName extends Component {
	render() {
		return (
			<Container>
				<Row>
					<h1> Lessons Calendar </h1>
				</Row>
				<Row>
					<Column>
						<Card>
							<h1>Data Section 1</h1>
						</Card>
					</Column>
					<Column>
						<Card>
							<h1>Data Section 2</h1>
						</Card>
					</Column>
					<Column>
						<Card>
							<h1>Data Section 3</h1>
						</Card>
					</Column>
				</Row>
				<Row>
					<Column>
						<Card>
							<Calendar />
						</Card>
					</Column>
				</Row>
			</Container>
		);
	}
}

document.addEventListener( "DOMContentLoaded", function(event) {
	render(
		<PluginName />,
		document.getElementById( 'cb-lessons-settings-page' ),
	);
});

